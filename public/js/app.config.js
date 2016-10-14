(function() {
    'use strict';

    angular
        .module('pantryApp')
        .config(config);
    
    config.$inject = ['RestangularProvider', 'CSRF_TOKEN'];
    
    function config(RestangularProvider, CSRF_TOKEN, $momentProvider){
        RestangularProvider.setDefaultHeaders({"X-CSRF-TOKEN": CSRF_TOKEN});
    }

})();