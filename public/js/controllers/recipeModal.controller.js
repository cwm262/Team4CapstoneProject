(function() {
'use strict';

    angular
        .module('pantryApp')
        .controller('RecipeModalController', RecipeModalController);

    RecipeModalController.$inject = ['recipe', 'alert', '$uibModalInstance', 'USER_ID', 'ngProgressFactory', '$rootScope'];
    function RecipeModalController(recipe, alert, $uibModalInstance, USER_ID, ngProgressFactory, $rootScope ) {

        var mvm = this;

        mvm.progressbar = ngProgressFactory.createInstance();

        //Close modal
        mvm.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };

        mvm.added = function () {
            mvm.progressbar.start();
            var data = {
               
            }
            recipe.post(data).then(function(response){
                $rootScope.$emit("RefreshRecipeList", {});
                $uibModalInstance.dismiss('close');
            })
            mvm.progressbar.complete();
        };
    }
})();