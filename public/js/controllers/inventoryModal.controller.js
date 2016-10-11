(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('InventoryModalController', InventoryModalController);

    InventoryModalController.$inject = ['$uibModalInstance', 'ngProgressFactory', 'grocery', 'inventory', 'USER_ID', '$rootScope'];
    
    function InventoryModalController($uibModalInstance, ngProgressFactory, grocery, inventory, USER_ID, $rootScope){

        var mvm = this;

        mvm.progressbar = ngProgressFactory.createInstance();

        mvm.grocery = grocery;
        mvm.amtToAdd = 0;
        
        mvm.added = function () {
            mvm.progressbar.start();
            var data = {
                user_id: USER_ID,
                item_id: mvm.grocery.itemList[0].item_id,
                quantity: mvm.amtToAdd,
                used: 0
            }
            inventory.post(data).then(function(response){
                $rootScope.$emit("RefreshItemList", {});
                $uibModalInstance.dismiss('close');
            })
            mvm.progressbar.complete();
        };

        mvm.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };

    }

})();