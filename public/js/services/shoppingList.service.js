(function() {
'use strict';

    angular
        .module('pantryApp')
        .service('shoppingList', shoppingList);

    shoppingList.$inject = ['Restangular'];
    function shoppingList(Restangular) {
        var service = {
            getList: getList,
            updateList: updateList,
            deleteList: deleteList,
            sendListWithOut: sendListWithOut,
            sendListWith: sendListWith
        };
        return service;

        function getList(user_id) {
            var shoppingList = Restangular.all('/api/DumbShoppingList/' + user_id);
            return shoppingList.getList();
        }

        function updateList(data){
            var shoppingList = Restangular.all('/api/DumbShoppingList/');
            return shoppingList.post(data);
        }

        function deleteList(user_id){
            return Restangular.one('/api/DumbShoppingList', user_id).remove();
        }

        function sendListWithOut(data){
            return Restangular.all('/api/email/send/').post(data);
        }

        function sendListWith(data){
            return Restangular.all('/api/email/smartSend/').post(data);
        }
    }
})();