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
            remove: remove,
            updateMade: updateMade,
            updateRating: updateRating
        };
        return service;

        function getAll(user_id){
            var recipes = Restangular.all('/api/recipes/' + user_id);
            return recipes.getList();
        }

        function getOne(id){
            return Restangular.one('/api/recipes/find', id).get();
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

        function updateMade(data, id){
            return Restangular.one('/api/recipes/made', id).customPUT(data);

        }

        function updateRating(data, id){
            return Restangular.one('/api/recipes/rating', id).customPUT(data);

        }

    }

})();