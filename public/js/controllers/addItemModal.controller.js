(function(){
    'use strict';

    angular
        .module('pantryApp')
        .controller('AddItemModalController', AddItemModalController)

    AddItemModalController.$inject = [
        '$uibModalInstance', 
        'ngProgressFactory', 
        'item', 
        'inventory',
        'USER_ID', 
        '$rootScope', 
        'alert'
    ];

    function AddItemModalController(
        $uibModalInstance, 
        ngProgressFactory, 
        item, 
        inventory,
        USER_ID, 
        $rootScope, 
        alert
    ){
        
        var mvm = this;

        mvm.itemToBeAdded = null;

        mvm.alreadyEntered = true;

        mvm.progressbar = ngProgressFactory.createInstance();
        
        mvm.itemSubmitted = function () {
            mvm.progressbar.start(); //showLoadBar

            var barcodeString = String(mvm.itemToBeAdded.barcode);

            item.getOne(barcodeString).then(function(response){
                $rootScope.$emit("AddToRecentlyAddedList", response[0]);
                $uibModalInstance.dismiss('close');
            }, function(error){
                //Build POST data for creating a new Item in DB
                var type = 0;
                if(mvm.itemToBeAdded.type === 'Liquid'){
                    type = 0;
                }
                else if(mvm.itemToBeAdded.type === 'Solid'){
                    type = 1;
                }
                var storage = 0;
                if(mvm.itemToBeAdded.storage === 'Freezer'){
                    storage = 0;
                }
                else if(mvm.itemToBeAdded.storage === 'Refrigerator'){
                    storage = 1;
                }
                else if(mvm.itemToBeAdded.storage === 'Pantry'){
                    storage = 2;
                }
                var ready_to_eat = 0;
                if(mvm.itemToBeAdded.ready_to_eat){
                    ready_to_eat = 1;
                }
                var data = {
                    barcode: barcodeString,
                    item_name: mvm.itemToBeAdded.itemName,
                    measurement: mvm.itemToBeAdded.measurement,
                    ready_to_eat: ready_to_eat,
                    servings_per_container: mvm.itemToBeAdded.servingsPer,
                    serving_size: mvm.itemToBeAdded.servingSize,
                    storage: storage,
                    type: type,
                    expiration: mvm.itemToBeAdded.expiration,
                    user_id: USER_ID,
                }
                item.post(data).then(function(response){
                    //Broadcast that an item has been entered to the AddItemController.
                    //Will contain the recently added object
                    $rootScope.$emit("AddToRecentlyAddedList", response);
                    $uibModalInstance.dismiss('close');
                }, function(error){
                    alert.add("danger", "Failed to add item. Perhaps it does not exist in your database, but you only entered a barcode.");
                })
            })
            
            mvm.progressbar.complete();
        };

        //Close modal
        mvm.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };

    }

}());