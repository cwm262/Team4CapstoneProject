(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('AddItemController', AddItemController);

    AddItemController.$inject = ['item', 'ngProgressFactory', '$location'];
    
    function AddItemController(item, ngProgressFactory, $location){

        var vm = this;
        
        //vm.progressbar = ngProgressFactory.createInstance();
        //vm.progressbar.setHeight('5px');
        //vm.progressbar.start();

        vm.goToManualInput = function(){
            $location.path('add-items/manual');
        }

    }

})();