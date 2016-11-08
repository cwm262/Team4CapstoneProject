(function() {
'use strict';

    angular
        .module('pantryApp')
        .controller('StatsController', StatsController);

    StatsController.$inject = ['stats', 'alert', 'USER_ID', 'moment'];
    function StatsController(stats, alert, USER_ID, moment) {
        var vm = this;

        vm.data = [];

        vm.labels = [
            moment().format('MMMM'),
            moment().subtract(1, 'months').format('MMMM'),
            moment().subtract(2, 'months').format('MMMM'),
            moment().subtract(3, 'months').format('MMMM'),
            moment().subtract(4, 'months').format('MMMM'),
            moment().subtract(5, 'months').format('MMMM')
        ];
        
        vm.series = ['Food Waste'];

        stats.getAll(USER_ID).then(function(response){
            vm.data = response['Waste Per Month'];
        })
    }
})();