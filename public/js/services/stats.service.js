(function() {
'use strict';

    angular
        .module('pantryApp')
        .service('stats', stats);

    stats.$inject = ['Restangular'];
    function stats(Restangular) {
        var service = {
            getAll: getAll
        };
        return service;

        function getAll(user_id) {
            var stats = Restangular.one('/api/stats/', user_id).get();
            return stats;
        }
    }
})();