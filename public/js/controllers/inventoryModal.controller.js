(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('InventoryModalController', InventoryModalController);

    InventoryModalController.$inject = ['$uibModalInstance', 'ngProgressFactory', 'grocery', 'inventory', 'USER_ID', '$rootScope', 'alert'];
    
    function InventoryModalController($uibModalInstance, ngProgressFactory, grocery, inventory, USER_ID, $rootScope, alert){

        var mvm = this;

        mvm.progressbar = ngProgressFactory.createInstance();

        mvm.grocery = grocery;
        mvm.amtToAdd = 0;
        mvm.amtToRemove = 0;
        mvm.selectedFood = null;

        //Select from list
        mvm.selectFood = function (food, event) {
            var result = document.getElementsByClassName("highlight");
            var wrappedResult = angular.element(result);
            wrappedResult.removeClass('highlight');

            var myEl = angular.element( event.target.parentElement );
            myEl.addClass('highlight');
            mvm.selectedFood = food;
        }
        
        mvm.added = function () {
            mvm.progressbar.start();
            var data = {
                user_id: USER_ID,
                item_id: mvm.grocery.itemList[0].item_id,
                quantity: mvm.amtToAdd,
                total: mvm.amtToAdd
            }
            inventory.post(data).then(function(response){
                $rootScope.$emit("RefreshItemList", {});
                $uibModalInstance.dismiss('close');
            })
            mvm.progressbar.complete();
        };

        mvm.removed = function () {
            mvm.progressbar.start();
            if(mvm.selectedFood == null){
                mvm.progressbar.complete();
                alert.add('info', 'Please select an item.');
                return;
            }
            if(mvm.amtToRemove > mvm.selectedFood.quantity){
                mvm.progressbar.complete();
                alert.add('warning', 'Amount to remove would exceed quantity in stock.');
            }else{
                var data = {
                    quantity: (mvm.selectedFood.quantity - mvm.amtToRemove),
                    used: (mvm.selectedFood.used + mvm.amtToRemove)
                }
                inventory.put(data, mvm.selectedFood.id).then(function(response){
                    $rootScope.$emit("RefreshItemList", {});
                    $uibModalInstance.dismiss('close');
                })
                mvm.progressbar.complete();
            }
            
        };

        mvm.expired = function () {
            mvm.progressbar.start();
            if(mvm.selectedFood == null){
                mvm.progressbar.complete();
                alert.add('info', 'Please select an item.');
                return;
            }
            if(mvm.amtToRemove > mvm.selectedFood.quantity){
                mvm.progressbar.complete();
                alert.add('warning', 'Amount reported would exceed quantity known in stock.');
            }else{
                var data = {
                    quantity: (mvm.selectedFood.quantity - mvm.amtToRemove),
                    expired: (mvm.selectedFood.expired + mvm.amtToRemove)
                }
                inventory.put(data, mvm.selectedFood.id).then(function(response){
                    $rootScope.$emit("RefreshItemList", {});
                    $uibModalInstance.dismiss('close');
                })
                mvm.progressbar.complete();
            }
            
        };

        mvm.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };

    }

})();