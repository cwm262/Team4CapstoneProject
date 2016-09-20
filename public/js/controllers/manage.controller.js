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

        item.getAll()
            .then(function(response){
                vm.items = response;
                vm.loading = false;
            })

        vm.selectFood = function(food){
            vm.selectedFood = food;
        }

    }

})();