(function() {
    'use strict';

    angular
        .module('pantryApp')
        .factory('alert', alert);

    alert.$inject = ['$rootScope', '$timeout'];
    
    function alert($rootScope, $timeout){

        var alert_levels = {
            danger: {timeout: 'none'},
            warning: {timeout: 4000},
            success: {timeout: 3000},
            info: {timeout: 2000}
        }

        $rootScope.alerts = [];

        var alertService = {
            add: add,
            closeAlert: closeAlert,
            closeAlertIdx: closeAlertIdx,
            clear: clear
        };

        return alertService;

        function add(type, msg, timeout) {
            var alert = {
                type: type,
                msg: msg,
                close: function () {
                    return alertService.closeAlert(this);
                }
            };

            $rootScope.alerts.push(alert);

            if (timeout === undefined) {
                timeout = (type in alert_levels) ? alert_levels[type].timeout : 0;
            }

            if (timeout > 0) {
                $timeout(function () {
                    alertService.closeAlert(alert);
                }, timeout);
            }
        }

        function closeAlert(alert) {
            return alertService.closeAlertIdx($rootScope.alerts.indexOf(alert));
        }

        function closeAlertIdx(index) {
            return $rootScope.alerts.splice(index, 1);
        }

        function clear() {
            $rootScope.alerts = [];
        }

    }

})();