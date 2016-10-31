(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('item', item);

    item.$inject = ['Restangular'];
    
    function item(Restangular){

        var service = {
            getAll: getAll,
            getOne: getOne,
            post: post,
            put: put,
            remove: remove
        };
        return service;

        function getAll(user_id){
            var items = Restangular.all('/api/items/' + user_id);
            return items.getList();
        }

        function getOne(barcodeNumber){
            var item = Restangular.one('/api/items/barcode', barcodeNumber).get();
            return item;
        }

        function post(data){
            var items = Restangular.all('/api/items/');
            return items.post(data);
        }

        function put(data, id){
            var items = Restangular.all('/api/items/');
            return Restangular.one('/api/items', id).customPUT(data);
        }

        function remove(id){
            return Restangular.one('/api/items', id).remove();
        }

    }

})();