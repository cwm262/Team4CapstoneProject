(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('MainController', MainController);

    MainController.$inject = ['USER_ID', 'notification', 'ngProgressFactory', 'alert', 'moment', '$confirm', 'recipe', '$location', '$uibModal', 'shoppingList'];
    
    function MainController(USER_ID, notification, ngProgressFactory, alert, moment, $confirm, recipe, $location, $uibModal, shoppingList){

        var vm = this;
        
        vm.progressbar = ngProgressFactory.createInstance(); //Instantiate progress bar for later use.

        //Gets all front-end notifications.
        function getAllNotifications(){
            vm.progressbar.start(); //Start Progress Bar to show load progress

            //Get urgent notifications ie food about to expire. Set num days until expiration to be displayed.
            notification.getUrgent(USER_ID).then(function(response){
                var currentDate = moment();
                vm.urgentNotifications = response;
                vm.urgentNotifications.forEach(function(notification){
                    var expirationDate = moment(notification.created_at).add(notification.item.expiration, 'days');
                    notification.daysUntilExpiration = expirationDate.diff(currentDate, 'days');
                })
            })

            //Get expired notifications ie food already expired. Set num days past expiration to be displayed.
            notification.getExpired(USER_ID).then(function(response){
                var currentDate = moment();
                vm.expiredNotifications = response;
                vm.expiredNotifications.forEach(function(notification){
                    var expirationDate = moment(notification.created_at).add(notification.item.expiration, 'days');
                    notification.daysPastExpiration = currentDate.diff(expirationDate, 'days');
                })
            })

            //Get recipe notifications ie recipes that can be prepared with inventory on hand.
            notification.getRecipes(USER_ID).then(function(response){
                var recipes = response;
                vm.recipeNotifications = [];
                if(recipes.length > 0){
                    recipes.forEach(function(index){
                        recipe.getOne(index).then(function(response){
                            vm.recipeNotifications.push(response);
                        })
                    })
                }      
            })

            // Display suggested shopping list for the user
            
            notification.getShoppingList(USER_ID).then(function(response){
                vm.shoppingList = response;
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

        vm.editShoppingList = function(){
            var modalInstance = $uibModal.open({
                templateUrl: "editShoppingList.html",
                controller: "ShoppingListModalController",
                controllerAs: "mvm"
            });
        }

        vm.sendWithOut = function(){
            var data = {
                user_id: USER_ID
            }
            shoppingList.sendListWithOut(data).then(function(response){
                alert.add('success', 'Your shopping list is on the way! Check your registered e-mail!');
            })
        }

        vm.sendWith = function(){
            var data = {
                user_id: USER_ID
            }
            shoppingList.sendListWith(data).then(function(response){
                alert.add('success', 'Your shopping list is on the way! Check your registered e-mail!');
            })
        }
        

    }

})();