(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('item', item);

    item.$inject = ['Restangular'];
    
    function item(Restangular){

        var items = Restangular.all('/api/items');

        var service = {
            getAll: getAll,
            getOne: getOne,
            post: post
        };
        return service;

        function getAll(){
            return items.getList();
        }

        function getOne(id){
            return items.get(id);
        }

        function post(data){
            return items.post(data);
        }

    }

})();