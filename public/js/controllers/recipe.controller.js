(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('RecipeController', RecipeController);

    RecipeController.$inject = ['recipe', 'ngProgressFactory', 'USER_ID', 'alert', '$uibModal', '$rootScope'];
    
    function RecipeController(recipe, ngProgressFactory, USER_ID, alert, $uibModal, $rootScope){

        var vm = this;
        vm.recipes = [];
        vm.selectedRecipe = null;
        vm.searchRecipes = "";

        //Setting up our load bar.
        vm.progressbar = ngProgressFactory.createInstance();

        function getFullRecipeList() {
            vm.progressbar.start();
            recipe.getAll(USER_ID).then(function(response){
                vm.recipes = response;
                vm.progressbar.complete();
            }, function(error){
                vm.progressbar.complete();
                alert.add("danger", "Unable to retrieve recipes. Please mark the time and contact support.");
            })
        }

        getFullRecipeList();

        $rootScope.$on("RefreshRecipeList", function(){
           getFullRecipeList();
        });

        vm.selectRecipe = function(recipe){
            vm.selectedRecipe = recipe;
        }

        vm.rateFunction = function(rating) {
            vm.selectedRecipe.rating = rating;
        };

        vm.removeRecipe = function(){
            //Code to remove recipe
        }

        vm.editRecipe = function(){
            //code to edit recipe
        }

        vm.newRecipe = function(){
            var modalInstance = $uibModal.open({
                templateUrl: "addRecipe.html",
                controller: 'RecipeModalController',
                controllerAs: 'mvm'
            });
        }

        vm.madeRecipe = function(){
            //Code to bump recipe made number.
        }


    }

})();