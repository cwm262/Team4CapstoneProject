(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('AddItemController', AddItemController);

    AddItemController.$inject = ['inventory', 'item', 'ngProgressFactory', '$location', 'alert', 'USER_ID'];
    
    function AddItemController(inventory, item, ngProgressFactory, $location, alert, USER_ID){

        var vm = this;

        //Creates an empty array to be used for the recently added menu on the left-side of the screen
        vm.recentlyAdded = [];
        
        //Creates a progress bar to be used as a loader
        vm.progressbar = ngProgressFactory.createInstance();
        vm.progressbar.setHeight('5px');

        //When a barcode is scanned, this function is called with the barcode as a parameter
        vm.barcodeScanned = function(barcode){
            vm.progressbar.start(); //Start loader
            if(barcode.length > 0){
                //Call DB to find out if item is in DB already
                item.getOne(barcode).then(function(response){
                    vm.itemScanned(response[0]); //if so, proceed
                    vm.progressbar.complete();
                }, function(error){
                    alert.add("warning", "Barcode not found. Please add item manually.");
                    vm.progressbar.complete();
                })
            }
        }

        //Slider defaults for choosing item quantity
        vm.slider = {
            value: 10,
            options: {
                floor: 1,
                ceil: 20
            }
        };        

        //Can't scan item. Go to manual input.
        vm.goToManualInput = function(){
            $location.path('add-items/manual');
        }

        //Item is selected from table view. Change to current selected item. Change slider value.
        vm.selectItem = function(item){
            vm.selectedItem = item;
            vm.slider.value = vm.selectedItem.quantity;
        }

        //Called when a barcode matches an item in our DB.
        vm.itemScanned = function(item){
            item.quantity = 0;
            //Push to recentlyAdded array.
            vm.recentlyAdded.push(item);
            
        }

        //When user elects to submit the item with its chosen quantity, this gets called.
        vm.addToGroceries = function(selectedItem){
            vm.progressbar.start();
            selectedItem.quantity = vm.slider.value; //Get quantity from slider value.
            //Build POST data
            var data = {
                item_id: selectedItem.item_id,
                user_id: USER_ID,
                quantity: selectedItem.quantity,
                used: 0  
            }
            //POST to db
            inventory.post(data).then(function(response){
                //Remove the submitted item from our recentlyAdded array.
                vm.recentlyAdded = _.reject(vm.recentlyAdded, function(el) { return el.item_id === selectedItem.item_id; });
                //Nullify selected item.
                selectedItem = null;
            }, function(error){
                alert.add("danger", "Failed to add item to inventory. Please mark date/time and report issue to support.");
            })
            vm.progressbar.complete();
        }

    }

})();