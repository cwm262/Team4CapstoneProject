(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('grocery', grocery);

    grocery.$inject = ['Restangular'];
    
    function grocery(Restangular){

        var grocerys = Restangular.all('/api/grocery');

        var service = {
            getAll: getAll,
            getOne: getOne,
            post: post,
            put: put,
            remove: remove
        };
        return service;

        function getAll(){
            return grocery.getList();
        }

        function getOne(id){
            return grocery.get(id);
        }

        function post(data){
            return grocery.post(data);
        }

        function put(data, id){
            return Restangular.one('/api/grocery', id).customPUT(data);
        }

        function remove(id){
            return Restangular.one('/api/grocery', id).remove();
        }

    }

})();