(function() {
'use strict';

    angular
        .module('pantryApp')
        .controller('ShoppingListModalController', ShoppingListModalController);

    ShoppingListModalController.$inject = ['shoppingList', 'item', 'alert', '$uibModalInstance', 'USER_ID', 'ngProgressFactory', '$rootScope'];
    function ShoppingListModalController(shoppingList, item, alert, $uibModalInstance, USER_ID, ngProgressFactory, $rootScope) {

        var mvm = this;

        mvm.progressbar = ngProgressFactory.createInstance();
        mvm.items = [];
        mvm.choices = [];

        function getItems(){
            item.getAll(USER_ID).then(function(response){
                mvm.items = response;
            }, function(error){
                alert.add('danger', 'Failed to retrieve known items. Please note the time and contact support.');
            })
        }

        mvm.progressbar.start();

        getItems();

        shoppingList.getList(USER_ID).then(function(response){
            response.forEach(function(listItem){
                mvm.choices.push({
                    'id': 'choice'+mvm.choices.length+1,
                    'selected': listItem.item,
                    'quantity': listItem.quantity
                })
            })
        });

        mvm.progressbar.complete();

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

        };

        mvm.edited = function () {
            mvm.progressbar.start();
            var items = [];
            mvm.choices.forEach(function(choice) {
                var item = {
                    item_id: choice.selected.item_id,
                    quantity: choice.quantity
                }
                items.push(item);
            }, this);
            var data = {
                user_id: USER_ID,
                items: JSON.stringify(items)
            }
            shoppingList.updateList(data).then(function(response){
                $uibModalInstance.dismiss('close');
            }, function(error){
                alert.add("danger", "Failed to update shopping list. Please mark the time and contact support.");
            })
            mvm.progressbar.complete();
        };
    }
})();