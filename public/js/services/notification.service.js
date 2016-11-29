(function() {
'use strict';

    angular
        .module('pantryApp')
        .service('notification', notification);

    notification.$inject = ['Restangular'];
    function notification(Restangular) {
        var service = {
            getUrgent: getUrgent,
            getRecipes: getRecipes,
            getDismiss: getDismiss,
            getExpired: getExpired,
            getShoppingList: getShoppingList
        };
        return service;

        function getUrgent(user_id) {
            var notifications = Restangular.all('/api/notifications/urgent/' + user_id);
            return notifications.getList();
        }

        function getRecipes(user_id) {
            var notifications = Restangular.all('/api/notifications/recipes/' + user_id);
            return notifications.getList();
        }

        function getDismiss(id) {
            return Restangular.one('/api/notifications/ignore', id).get();
        }

        function getExpired(user_id) {
            var notifications = Restangular.all('/api/notifications/expired/' + user_id);
            return notifications.getList();
        }

        function getShoppingList(user_id, dateRange = null, numDays = null){
            if(dateRange){
                if(numDays){
                    return Restangular.one('/api/SmartShoppingList/' + user_id + '/' + dateRange + '/' + numDays).get();
                }else{
                    return Restangular.one('/api/SmartShoppingList/' + user_id + '/' + dateRange).get();
                }
            }
            return Restangular.one('/api/SmartShoppingList/' + user_id).get();
        }
    }
})();