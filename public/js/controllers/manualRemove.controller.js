(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('ManualRemoveController', ManualRemoveController);

    ManualRemoveController.$inject = ['item', 'ngProgressFactory', 'alert', '$location'];
    
    function ManualRemoveController(item, ngProgressFactory, alert, $location){

        var vm = this;

        //Note: may need to add more fields.
        vm.itemToBeRemoved = {
            barcode: null,
            itemName: null,
            quantity: null
        }

        vm.backToRemoveItemsPage = function(){
            $location.path('remove-items');
        }
        
        //vm.progressbar = ngProgressFactory.createInstance();

        vm.removeItemFromDB = function(){
            //Search db for item matching barcode or itemName or etc. Get id
            //vm.progressbar.start();
            // item.remove(id).then(function(response){
            //     vm.progressbar.complete();
            //     alert.add("success", "Items removed.");
            //     $location.path('remove-items');
            // }, function(error){
            //     vm.progressbar.complete();
            //     $location.path('/');
            //     alert.add("danger", "Failed to remove item " + error.data.message);
            // });
        }
    }

})();