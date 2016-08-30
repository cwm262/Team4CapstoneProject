(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('ManageItemsController', ManageItemsController);
    
    function ManageItemsController(item){

        var vm = this;

        vm.loading = true;

        item.get()
            .then(function(response){
                vm.items = response.data;
                vm.loading = false;
            })

    }

})();