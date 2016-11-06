(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('MainController', MainController);

    MainController.$inject = ['USER_ID', 'notification', 'ngProgressFactory', 'alert', 'moment', '$confirm'];
    
    function MainController(USER_ID, notification, ngProgressFactory, alert, moment, $confirm){

        var vm = this;
        
        vm.progressbar = ngProgressFactory.createInstance();

        function getAllNotifications(){
            vm.progressbar.start();
            notification.urgent(USER_ID)
            .then(function(response){
                var currentDate = moment();
                vm.urgentNotifications = response;
                vm.urgentNotifications.forEach(function(notification){
                    var expirationDate = moment(notification.created_at).add(notification.item.expiration, 'days');
                    notification.daysUntilExpiration = expirationDate.diff(currentDate, 'days');
                })
                vm.progressbar.complete();
            }, function(error){
                alert.add('danger', 'Failed to retrieve notifications! Please note the time and contact support.');
            })
        }

        getAllNotifications();

        vm.dismissed = function(item){
            $confirm({ text: 'Are you sure you want to dismiss this notification? It will not reappear for a week.', title: 'Dismiss Notification', ok: 'Yes', cancel: 'No'}).then(function () {
                notification.dismiss(item.id).then(function(response){
                    getAllNotifications();
                }, function(error){
                    alert.add("danger", "Unable to dismiss notification. Please mark the time and contact support.");
                })
            }); 
        }
        

    }

})();