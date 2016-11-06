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
            getExpired: getExpired
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

        }
    }
})();