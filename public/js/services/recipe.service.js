(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('recipe', recipe);

    recipe.$inject = ['Restangular'];
    
    function recipe(Restangular){

        var service = {
            getAll: getAll,
            getOne: getOne,
            post: post,
            put: put,
            remove: remove
        };
        return service;

        function getAll(user_id){
            var recipes = Restangular.all('/api/recipes/' + user_id);
            return recipes.getList();
        }

        function getOne(id){
            return recipes.get(id);
        }

        function post(data){
            var recipes = Restangular.all('/api/recipes');
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