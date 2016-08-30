(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('MainController', MainController);
    
    function MainController(){

        var vm = this;
        vm.message = "Hello";

    }

})();