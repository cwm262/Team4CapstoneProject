(function() {
'use strict';

    angular
        .module('pantryApp')
        .controller('RecipeModalController', RecipeModalController);

    RecipeModalController.$inject = ['recipe', 'item', 'alert', '$uibModalInstance', 'USER_ID', 'ngProgressFactory', '$rootScope'];
    function RecipeModalController(recipe, item, alert, $uibModalInstance, USER_ID, ngProgressFactory, $rootScope ) {

        var mvm = this;

        mvm.progressbar = ngProgressFactory.createInstance();
        mvm.items = [];
        mvm.recipe = null;

        mvm.choices = [{id: 'choice1'}];
  
        mvm.addNewChoice = function() {
            var newItemNo = mvm.choices.length+1;
            mvm.choices.push({'id':'choice'+newItemNo});
        };
            
        mvm.removeChoice = function(index) {
            mvm.choices.splice(index, 1);
        };

        function getItems(){
            item.getAll(USER_ID).then(function(response){
                mvm.items = response;
            }, function(error){
                alert.add('danger', 'Failed to retrieve known items. Please note the time and contact support.');
            })
        }

        getItems();

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
                $rootScope.$emit("RefreshRecipeList", {});
                $uibModalInstance.dismiss('close');
            })
            mvm.progressbar.complete();
        };
    }
})();