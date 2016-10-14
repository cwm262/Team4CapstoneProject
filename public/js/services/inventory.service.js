(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('inventory', inventory);

    inventory.$inject = ['Restangular'];
    
    function inventory(Restangular){

        var service = {
            getAll: getAll,
            getOne: getOne,
            post: post,
            put: put,
            remove: remove
        };
        return service;

        function getAll(user_id){
            var inventory = Restangular.all('/api/inventory/' + user_id);
            return inventory.getList();
        }

        function getOne(user_id, item_id){
            var inventory = Restangular.all('/api/inventory/');
            return inventory.get(user_id, item_id);
        }

        function post(data){
            var inventory = Restangular.all('/api/inventory/');
            return inventory.post(data);
        }

        function put(data, id){
            return Restangular.one('/api/inventory', id).customPUT(data);
        }

        function remove(id){
            return Restangular.one('/api/inventory', id).remove();
        }

    }

})();