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
            "Wasted",
            "Used"
            //moment().format('MMMM')
            // moment().subtract(1, 'months').format('MMMM'),
            // moment().subtract(2, 'months').format('MMMM'),
            // moment().subtract(3, 'months').format('MMMM'),
            // moment().subtract(4, 'months').format('MMMM'),
            // moment().subtract(5, 'months').format('MMMM')
        ];
        
        //vm.series = ['Food Waste'];

        stats.getAll(USER_ID).then(function(response){
            vm.month0 = response['month 0'];
            vm.month0.shift();
            vm.month1 = response['month 1'];
            vm.month1.shift();
            vm.month2 = response['month 2'];
            vm.month2.shift();
            vm.month3 = response['month 3'];
            vm.month3.shift();
            vm.month4 = response['month 4'];
            vm.month4.shift();
            vm.month5 = response['month 5'];
            vm.month5.shift();
        })
    }
})();