(function() {
    'use strict';

    angular
        .module('pantryApp')
        .config(config);

    config.$inject = ['$routeProvider'];
    
    function config($routeProvider){

        $routeProvider
            .when("/", {
                templateUrl : "templates/main.html",
                controller: "MainController",
                controllerAs: "vm"
            })
            .when("/add-items", {
                templateUrl : "templates/add.html",
                controller: "AddItemController",
                controllerAs: "vm"
            })
            .when("/remove-items", {
                templateUrl : "templates/remove.html",
                controller: "RemoveItemController",
                controllerAs: "vm"
            })
            .when("/manage", {
                templateUrl : "templates/manage.html",
                controller: "ManageItemsController",
                controllerAs: "vm"
            })
            .when("/recipes", {
                templateUrl : "templates/recipes.html",
                controller: "RecipeController",
                controllerAs: "vm"
            })
            .when("/recipes/:recipeID", {
                templateUrl : "templates/recipes.html",
                controller: "RecipeController",
                controllerAs: "vm"
            })
            .when("/statistics", {
                templateUrl : "templates/statistics.html",
                controller: "StatisticsController",
                controllerAs: "vm"
            })

    }

})();