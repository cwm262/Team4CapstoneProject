(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('recipe', recipe);

    recipe.$inject = ['Restangular'];
    
    function recipe(Restangular){

        var recipes = Restangular.all('/api/recipes');

        var service = {
            getAll: getAll,
            getOne: getOne,
            post: post,
            put: put,
            remove: remove
        };
        return service;

        function getAll(){
            return recipes.getList();
        }

        function getOne(id){
            return recipes.get(id);
        }

        function post(data){
            return recipes.post(data);
        }

        function put(data, id){
            return Restangular.one('/api/recipes', id).customPUT(data);
        }

        function remove(id){
            return Restangular.one('/api/recipes', id).remove();
        }

    }

})();