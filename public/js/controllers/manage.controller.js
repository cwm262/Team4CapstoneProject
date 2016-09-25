(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('ManageItemsController', ManageItemsController);

    ManageItemsController.$inject = ['item'];
    
    function ManageItemsController(item){

        var vm = this;

        vm.loading = true;
        vm.item_name = null;
        vm.selectedFood = null;

        //Perform get request to build an array of inventory items. Will need to call inventory and items.
        // item.getAll()
        //     .then(function(response){
        //         vm.items = response;
        //         vm.loading = false;
        //     })

        vm.selectFood = function(food){
            vm.selectedFood = food;
        }

        vm.updateSelectedFood = function(){
            //Update quantity/etc on selected
            //Should remove if quantity set to 0
        }

    }

})();