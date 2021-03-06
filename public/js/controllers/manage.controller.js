(function () {
    'use strict';

    angular
        .module('pantryApp')
        .controller('ManageItemsController', ManageItemsController);

    ManageItemsController.$inject = ['inventory', 'USER_ID', '$filter', 'moment', 'ngProgressFactory', '$uibModal', '$rootScope', '$window', '$timeout'];

    function ManageItemsController(inventory, USER_ID, $filter, moment, ngProgressFactory, $uibModal, $rootScope, $window, $timeout) {

        var vm = this;

        //Setting up our load bar.
        vm.progressbar = ngProgressFactory.createInstance();

        vm.selectedFood = null;
        vm.searchInventory = "";

        vm.getFullItemList = function(){
            vm.progressbar.start();
            vm.itemGroups = [];
            vm.groceries = [];
            var currentDate = moment();
            //Perform get request to get all items in user's inventory (calling with USER_ID)
            inventory.getAll(USER_ID)
                .then(function (response) {
                    vm.items = response;

                    //Finding out how long until each item expires. Using moment.js for the date manipulation.
                    angular.forEach(vm.items, function (value, key) {
                        value.item.storage = $filter('storageType')(value.item.storage);
                        var expirationDate = moment(value.created_at).add(value.item.expiration, 'days');
                        value.daysUntilExpiration = expirationDate.diff(currentDate, 'days');
                    });

                    /*
                        Building an array of objects with the following inside each object:
                            String name: String value,
                            String itemList: Array<GroceryItem> itemList, 
                                An array of items that have the same name as the object.
                            String total: Float totalQuantity,
                            String unit: String unit

                    */
                    angular.forEach(vm.items, function (value, key) {
                        //Step one: build an array of names
                        if (vm.itemGroups.indexOf(value.item.item_name) == -1) {
                            vm.itemGroups.push(value.item.item_name);
                        }
                    })
                    angular.forEach(vm.itemGroups, function (value, key) {
                        //Step two: build the array and other properties for our final array list.
                        var itemList = [];
                        var totalQuantity = 0;
                        var unit = "";
                        angular.forEach(vm.items, function (v, k) {
                            if (value === v.item.item_name) {
                                itemList.push(v);
                                totalQuantity += (v.quantity/v.item.servings_per_container);//chris touched this
                                if (unit !== v.item.measurement) {
                                    unit = v.item.measurement;
                                }
                            }
                        })
                        vm.groceries.push({
                            name: value,
                            itemList: itemList,
                            total: totalQuantity.toFixed(2),
                            unit: unit
                        })
                    })
                    //Stop progressbar. Page has loaded.
                })
                vm.progressbar.complete();
        }

        vm.getFullItemList();

        $rootScope.$on("RefreshItemList", function(){
           vm.getFullItemList();
        });

        $rootScope.$on("FocusSearchBar", function(){
            $timeout(function() {
                var element = $window.document.getElementById("searchField");
                element.focus();
            }, 2000);
            
        });

        //Put selected food's details in view to the right of our list.
        vm.selectFood = function (food) {
            vm.selectedFood = food;
        }

        //User has selected to update an item in their inventory.
        vm.updateSelectedFood = function (action, grocery) {
            if(action === 'add'){
                var modalInstance = $uibModal.open({
                    templateUrl: "addToModal.html",
                    resolve: {
                        grocery: grocery
                    },
                    controller: 'InventoryModalController',
                    controllerAs: 'mvm'
                });
            }
            else if(action === 'remove'){
                var modalInstance = $uibModal.open({
                    templateUrl: "removeFromModal.html",
                    resolve: {
                        grocery: grocery
                    },
                    controller: 'InventoryModalController',
                    controllerAs: 'mvm'
                });
            }
            else if(action === 'waste'){
                var modalInstance = $uibModal.open({
                    templateUrl: "expireModal.html",
                    resolve: {
                        grocery: grocery
                    },
                    controller: 'InventoryModalController',
                    controllerAs: 'mvm'
                });
            }
            

            
        };

    }

})();