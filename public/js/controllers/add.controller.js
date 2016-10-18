(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('AddItemController', AddItemController);

    AddItemController.$inject = [
        'inventory', 
        'item',
        'ngProgressFactory', 
        '$location', 
        'alert', 
        'USER_ID', 
        '$uibModal', 
        '$rootScope',
        '$confirm'
    ];
    
    function AddItemController(
        inventory, 
        item, 
        ngProgressFactory, 
        $location, 
        alert, 
        USER_ID, 
        $uibModal, 
        $rootScope,
        $confirm
    ){

        var vm = this;

        //Creates an empty array to be used for the recently added menu on the left-side of the screen
        vm.recentlyAdded = [];
        
        //Creates a progress bar to be used as a loader
        vm.progressbar = ngProgressFactory.createInstance();
        vm.progressbar.setHeight('5px');

        //When a barcode is scanned, this function is called with the barcode as a parameter
        vm.barcodeScanned = function(barcode){

            //If the manual add item modal is open, don't continue
            if(angular.element( document.querySelector( '.addItemModal' ) ).hasClass('in')){
                return;
            }
            
            if(barcode.length > 0){
                //Call DB to find out if item is in DB already
                item.getOne(barcode).then(function(response){
                    vm.itemScanned(response[0]); //if so, proceed
                }, function(error){
                    alert.add("warning", "Barcode not found. Please add item manually.");
                })
            }
        }    

        //Can't scan item. Go to manual input.
        vm.manualInputSelected = function(){
            var modalInstance = $uibModal.open({
                templateUrl: "manuallyAddItem.html",
                controller: 'AddItemModalController',
                controllerAs: 'mvm',
                windowTopClass: 'addItemModal'
            });
        }

        //Item is selected from table view. Change to current selected item. Change slider value.
        vm.selectItem = function(item){
            vm.selectedItem = item;
            vm.slider.value = vm.selectedItem.quantity;
        }

        //Called when a barcode matches an item in our DB.
        vm.itemScanned = function(item){
            item.quantity = 1;
            //Push to recentlyAdded array.
            vm.recentlyAdded.push(item);
            
        }

        //Remove an index from the recentlyAdded array of items.
        vm.itemRemoved = function(index){
            $confirm({ text: 'Are you sure you want to remove this item?', title: 'Remove Item', ok: 'Yes', cancel: 'No'}).then(function () {
                vm.recentlyAdded.splice(index, 1);
            }); 
        }

        //Empty the array to 'cancel' submission process
        vm.submitCancelled = function(){
            $confirm({ text: 'Are you sure you want to cancel?', title: 'Cancel Submission', ok: 'Yes', cancel: 'No'}).then(function () {
                vm.recentlyAdded = [];
            }); 
        }

        //When user elects to submit the item with its chosen quantity, this gets called.
        vm.groceriesSubmitted = function(){
            $confirm({ text: 'Are you that you want to submit these items?', title: 'Confirm Submission', ok: 'Yes', cancel: 'No'}).then(function () {
                vm.progressbar.start();
                var submittedArray = [];
                
                angular.forEach(vm.recentlyAdded, function(value, key){
                    var needle = _.find(submittedArray, function(o){
                        return o.item_id === value.item_id;
                    })
                    if(needle){
                        needle.quantity += value.quantity;
                    }else{
                        submittedArray.push(value);
                    }
                })

                angular.forEach(submittedArray, function(value, key) {
                    //Build POST data
                    var data = {
                        item_id: value.item_id,
                        user_id: USER_ID,
                        quantity: value.quantity,
                        total: value.quantity  
                    }
                    //POST to db
                    inventory.post(data).then(function(response){
                    }, function(error){
                        alert.add("danger", "Failed to add " + value.item_name + "to inventory. Please mark date/time and report issue to support.");
                    });
                });

                vm.recentlyAdded = [];
                vm.progressbar.complete();
            }); 
            
        }

        //Listen for a broadcast from modal controller
        //data will be the recently manually added object
        //Pass it to the itemScanned function to be added to our list
        $rootScope.$on("AddToRecentlyAddedList", function(event, data){
            vm.itemScanned(data);
        });

    }

})();