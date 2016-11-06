(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('MainController', MainController);

    MainController.$inject = ['USER_ID', 'notification', 'ngProgressFactory', 'alert', 'moment', '$confirm', 'recipe', '$location'];
    
    function MainController(USER_ID, notification, ngProgressFactory, alert, moment, $confirm, recipe, $location){

        var vm = this;
        
        vm.progressbar = ngProgressFactory.createInstance(); //Instantiate progress bar for later use.

        vm.recipeNotifications = [];

        //Gets all front-end notifications.
        function getAllNotifications(){
            vm.progressbar.start(); //Start Progress Bar to show load progress

            notification.getUrgent(USER_ID).then(function(response){
                var currentDate = moment();
                vm.urgentNotifications = response;
                vm.urgentNotifications.forEach(function(notification){
                    var expirationDate = moment(notification.created_at).add(notification.item.expiration, 'days');
                    notification.daysUntilExpiration = expirationDate.diff(currentDate, 'days');
                })
            }, function(error){
                alert.add('danger', 'Failed to retrieve urgent notifications! Please note the time and contact support.');
            })

            notification.getRecipes(USER_ID).then(function(response){
                var recipes = response;
                if(recipes.length > 0){
                    recipes.forEach(function(index){
                        recipe.getOne(index).then(function(response){
                            vm.recipeNotifications.push(response);
                        })
                    })
                }
            }, function(error){
                alert.add('danger', 'Failed to retrieve recipe notifications! Please note the time and contact support.');
            })


            vm.progressbar.complete(); //load done
        }

        getAllNotifications(); //Call front end getters to populate notifications

        //Dismissed will dismiss/ignore item from notification list
        vm.dismissed = function(item){
            $confirm({ text: 'Are you sure you want to dismiss this notification? It will not reappear for a week.', title: 'Dismiss Notification', ok: 'Yes', cancel: 'No'}).then(function () {
                notification.getDismiss(item.id).then(function(response){
                    getAllNotifications();
                }, function(error){
                    alert.add("danger", "Unable to dismiss notification. Please mark the time and contact support.");
                })
            }); 
        }

        vm.goToRecipe = function(id){
            $location.path('recipes/'+id);
        }
        

    }

})();