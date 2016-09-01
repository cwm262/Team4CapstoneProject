(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('ManageItemsController', ManageItemsController);

    ManageItemsController.$inject = ['item'];
    
    function ManageItemsController(item){

        var vm = this;

        vm.loading = true;

        item.getAll()
            .then(function(response){
                vm.items = response;
                vm.loading = false;
            })

    }

})();