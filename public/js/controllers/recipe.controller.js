(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('RecipeController', RecipeController);

    RecipeController.$inject = ['recipe', 'ngProgressFactory', 'USER_ID', 'alert', '$uibModal', '$rootScope', '$confirm', '$scope'];
    
    function RecipeController(recipe, ngProgressFactory, USER_ID, alert, $uibModal, $rootScope, $confirm, $scope){

        var vm = this;
        vm.recipes = [];
        vm.selectedRecipe = null;
        vm.searchRecipes = "";

        //Setting up our load bar.
        vm.progressbar = ngProgressFactory.createInstance();

        //Query db for full list of recipes connected to our user
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
        

        //Listens for a call to refresh the recipe list. Modal will transmit call.
        $rootScope.$on("RefreshRecipeList", function(event, data){
            if(data.voidSelectedRecipe == true){
                vm.selectedRecipe = null;
            }
            getFullRecipeList();
        });

        //Put selected recipe in area to right of recipe list.
        vm.selectRecipe = function(recipe){
            vm.selectedRecipe = recipe;
        }

        //Called when a star rating is changed for the selected recipe. Updates rating in storage
        vm.rateFunction = function(rating) {
            var data = {
                'rating': rating
            }
            recipe.updateRating(data, vm.selectedRecipe.rating.id).then(function(response){
                getFullRecipeList();
            }, function(error){
                alert.add("danger", "Unable to update recipe rating. Please mark the time and contact support.");
            })
        };

        //Remove recipe with confirmation box.
        vm.removeRecipe = function(id){
            $confirm({ text: 'Are you sure you want to remove this recipe?', title: 'Remove Recipe', ok: 'Yes', cancel: 'No'}).then(function () {
                recipe.remove(id).then(function(response){
                    vm.selectedRecipe = null;
                    getFullRecipeList();
                }, function(error){
                    alert.add("danger", "Unable to remove recipe. Please mark the time and contact support.");
                })
            }); 
        }

        //Create modal to be used with RecipeModalController for editing recipe
        vm.editRecipe = function(myRecipe){
            var modalInstance = $uibModal.open({
                templateUrl: "editRecipe.html",
                resolve: {
                    myRecipe: myRecipe
                },
                controller: 'RecipeModalController',
                controllerAs: 'mvm'
            });
        }

        //Create modal to be used with RecipeModalController for adding a new recipe.
        vm.newRecipe = function(){
            var modalInstance = $uibModal.open({
                templateUrl: "addRecipe.html",
                resolve: {
                    myRecipe: null
                },
                controller: 'RecipeModalController',
                controllerAs: 'mvm'
            });
        }

        vm.madeRecipe = function(id){
            var data = {
                'recipe_id': vm.selectedRecipe.recipe_id,
                'user_id': USER_ID
            };
            recipe.updateMade(data, id).then(function(response){
                recipe.getOne(vm.selectedRecipe.recipe_id).then(function(response){
                    vm.selectedRecipe = response;
                }, function(error){
                    alert.add("danger", "Unable to retrieve recipe information. Please mark the time and contact support.");
                })
                getFullRecipeList();
            }, function(error){
                alert.add("danger", "Unable to update the amount of recipes made. Please mark the time and contact support.");
            })
        }


    }

})();