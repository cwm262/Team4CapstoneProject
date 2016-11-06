(function() {
'use strict';

    angular
        .module('pantryApp')
        .service('notification', notification);

    notification.$inject = ['Restangular'];
    function notification(Restangular) {
        var service = {
            urgent: urgent,
            recipes: recipes,
            dismiss: dismiss,
            expired: expired
        };
        return service;

        function urgent(user_id) {
            var notifications = Restangular.all('/api/notifications/urgent/' + user_id);
            return notifications.getList();
        }

        function recipes(user_id) {

        }

        function dismiss(id) {
            return Restangular.one('/api/notifications/ignore', id).get();
        }

        function expired(user_id) {

        }
    }
})();