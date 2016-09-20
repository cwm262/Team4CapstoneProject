(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('MainController', MainController);

    MainController.$inject = ['item', 'ngProgressFactory'];
    
    function MainController(item, ngProgressFactory){

        var vm = this;
        
        vm.progressbar = ngProgressFactory.createInstance();
        //vm.progressbar.setHeight('5px');
        vm.progressbar.start();

        item.getAll()
            .then(function(response){
                vm.progressbar.complete();
                vm.items = response;
            })

    }

})();