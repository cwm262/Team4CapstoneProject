(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('ManualInputController', ManualInputController);

    ManualInputController.$inject = ['item', 'ngProgressFactory', 'alert', '$location'];
    
    function ManualInputController(item, ngProgressFactory, alert, $location){

        var vm = this;

        //Note: may need to add more fields.
        vm.itemToBeAdded = {
            barcode: null,
            itemName: null,
            measurement: null,
            storage: null,
            servingSize: null,
            servingsPer: null
        }

        vm.backToAddItemsPage = function(){
            $location.path('add-items');
        }
        
        //vm.progressbar = ngProgressFactory.createInstance();

        vm.addItemToDB = function(){
            //vm.progressbar.start();
            // item.post(vm.itemToBeAdded).then(function(response){
            //     vm.progressbar.complete();
            //     alert.add("success", "Item registered.");
            //     $location.path('add-items');
            // }, function(error){
            //     vm.progressbar.complete();
            //     $location.path('/');
            //     alert.add("danger", "Failed to add item " + error.data.message);
            // });
        }
    }

})();