(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('item', item);

    item.$inject = ['$http', 'CSRF_TOKEN'];
    
    function item($http, CSRF_TOKEN){

        var service = {
            get: get
        };
        return service;

        function get(){
            var config = {
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            }
            return $http.get('/api/items', config);
        }

    }

})();