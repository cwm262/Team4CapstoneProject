(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('item', item);

    item.$inject = ['Restangular'];
    
    function item(Restangular){

        var service = {
            getAll: getAll,
            getOne: getOne
        };
        return service;

        function getAll(){
            return Restangular.all('/api/items').getList();
        }

        function getOne(id){
            return Restangular.one('/api/items', id).get();
        }

    }

})();