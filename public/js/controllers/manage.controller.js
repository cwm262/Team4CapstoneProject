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

        item.getAll()
            .then(function(response){
                vm.items = response;
                vm.loading = false;
            })

        vm.addItem = function(){
            var data = {
                item_name: vm.item_name             
            }
            item.post(data).then(function(response){
                $location.path('items');
                alert.add("success", "Item added.");
            }, function(error){
                $location.path('/');
                alert.add("danger", "Failed to add item: " + error.data.message);
            })
        }

    }

})();