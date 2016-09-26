(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('RecipeController', RecipeController);

    RecipeController.$inject = ['recipe'];
    
    function RecipeController(recipe){

        var vm = this;
        vm.recipes = [];
        vm.selectedRecipe = null;

        vm.selectRecipe = function(recipe){
            vm.selectedRecipe = recipe;
        }

        //Dummy recipe for demo purposes
        vm.dummyRecipe = {
            recipe_id: 4,
            name: 'Spaghetti',
            instructions: "Boil 4 quarts of water. Add salt to taste. Add pasta to water, wait for it to boil again. Stir frequently, cook about 10 minutes. Remove from heat and drain. Add back to pan, add 1 jar tomato sauce. Mix and enjoy!",
            prep_time: 10,
            ingredients: [
                {
                    name: "Pasta",
                    quantity: 1,
                    measurement: "lbs"
                },
                {
                    name: "Tomato Sauce",
                    quantity: 1,
                    measurement: "jar"
                }
            ],
            rating: 3

        }

        vm.recipes.push(vm.dummyRecipe);

        /*End dummy data*/


        vm.selectedRecipe = _.first(vm.recipes);

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
            //Code to add new recipe
        }

        vm.madeRecipe = function(){
            //Code to bump recipe made number.
        }


    }

})();