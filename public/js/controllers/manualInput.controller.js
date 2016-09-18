(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('ManualInputController', ManualInputController);

    ManualInputController.$inject = ['item', 'ngProgressFactory'];
    
    function ManualInputController(item, ngProgressFactory){

        var vm = this;

        vm.itemToBeAdded = {
            barcode: null,
            itemName: null
        }
        
        //vm.progressbar = ngProgressFactory.createInstance();
        //vm.progressbar.setHeight('5px');
        //vm.progressbar.start();

        vm.addItemToDB = function(){

        }

    }

})();