(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('AddItemController', AddItemController);

    AddItemController.$inject = ['inventory', 'item', 'ngProgressFactory', '$location', 'alert', 'USER_ID', '$uibModal', '$rootScope'];
    
    function AddItemController(inventory, item, ngProgressFactory, $location, alert, USER_ID, $uibModal, $rootScope){

        var vm = this;

        //Creates an empty array to be used for the recently added menu on the left-side of the screen
        vm.recentlyAdded = [];
        
        //Creates a progress bar to be used as a loader
        vm.progressbar = ngProgressFactory.createInstance();
        vm.progressbar.setHeight('5px');

        //When a barcode is scanned, this function is called with the barcode as a parameter
        vm.barcodeScanned = function(barcode){
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
                controllerAs: 'mvm'
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
            vm.recentlyAdded.splice(index, 1);
        }

        //Empty the array to 'cancel' submission process
        vm.submitCancelled = function(){
            vm.recentlyAdded = [];
        }

        //When user elects to submit the item with its chosen quantity, this gets called.
        vm.groceriesSubmitted = function(){
            vm.progressbar.start();
            
            angular.forEach(vm.recentlyAdded, function(value, key) {
                //Build POST data
                var data = {
                    item_id: value.item_id,
                    user_id: USER_ID,
                    quantity: value.quantity,
                    used: 0  
                }
                //POST to db
                inventory.post(data).then(function(response){
                }, function(error){
                    alert.add("danger", "Failed to add " + value.item_name + "to inventory. Please mark date/time and report issue to support.");
                })
                
            });
            vm.recentlyAdded = [];
            alert.add("success", "Items have been added to inventory!");
            vm.progressbar.complete();
        }

        $rootScope.$on("AddToRecentlyAddedList", function(data){
            console.log(data);
           //vm.itemScanned();
        });

    }

})();