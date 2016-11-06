(function() {
'use strict';

    angular
        .module('pantryApp')
        .controller('RecipeModalController', RecipeModalController);

    RecipeModalController.$inject = ['recipe', 'item', 'alert', '$uibModalInstance', 'USER_ID', 'ngProgressFactory', '$rootScope', 'myRecipe'];
    function RecipeModalController(recipe, item, alert, $uibModalInstance, USER_ID, ngProgressFactory, $rootScope, myRecipe ) {

        var mvm = this;

        mvm.progressbar = ngProgressFactory.createInstance();
        mvm.items = [];
        mvm.recipe = null;
        mvm.choices = [];

        function getItems(){
            item.getAll(USER_ID).then(function(response){
                mvm.items = response;
            }, function(error){
                alert.add('danger', 'Failed to retrieve known items. Please note the time and contact support.');
            })
        }

        getItems();

        if(myRecipe){
            mvm.progressbar.start();
            mvm.myRecipe = myRecipe;

            mvm.myRecipe.ingredients.forEach(function(ingredient){
                mvm.choices.push({
                    'id': 'choice'+mvm.choices.length+1,
                    'selected': ingredient.item,
                    'quantity': ingredient.quantity
                })
            })
            mvm.progressbar.complete();
        }

        //mvm.choices = [{id: 'choice1'}];
  
        mvm.addNewChoice = function() {
            var newItemNo = mvm.choices.length+1;
            mvm.choices.push({'id':'choice'+newItemNo});
        };
            
        mvm.removeChoice = function(index) {
            mvm.choices.splice(index, 1);
        };

        

        //Close modal
        mvm.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };

        mvm.added = function () {
            mvm.progressbar.start();
            var ingredients = [];
            mvm.choices.forEach(function(choice) {
                var ingredient = {
                    item_id: choice.selected.item_id,
                    quantity: choice.quantity
                }
                ingredients.push(ingredient);
            }, this);
            var data = {
               user_id: USER_ID,
               name: mvm.recipe.name,
               prep_time: mvm.recipe.prep_time,
               instructions: mvm.recipe.instructions,
               ingredients: ingredients
            }
            recipe.post(data).then(function(response){
                var data = {};
                data.voidSelectedRecipe = true;
                $rootScope.$emit("RefreshRecipeList", data);
                $uibModalInstance.dismiss('close');
            }, function(error){
                alert.add("danger", "Failed to add recipe. Please mark the time and contact support.");
            })
            mvm.progressbar.complete();
        };

        mvm.edited = function () {
            mvm.progressbar.start();
            var ingredients = [];
            mvm.choices.forEach(function(choice) {
                var ingredient = {
                    item_id: choice.selected.item_id,
                    quantity: choice.quantity
                }
                ingredients.push(ingredient);
            }, this);
            var data = {
                user_id: USER_ID,
                name: mvm.myRecipe.name,
                prep_time: mvm.myRecipe.prep_time,
                instructions: mvm.myRecipe.instructions,
                ingredients: ingredients
            }
            recipe.put(data, mvm.myRecipe.recipe_id).then(function(response){
                var data = {};
                data.voidSelectedRecipe = true;
                $rootScope.$emit("RefreshRecipeList", data);
                $uibModalInstance.dismiss('close');
            }, function(error){
                alert.add("danger", "Failed to add recipe. Please mark the time and contact support.");
            })
            mvm.progressbar.complete();
        };
    }
})();