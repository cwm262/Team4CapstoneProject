(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('ManageItemsController', ManageItemsController);

    ManageItemsController.$inject = ['inventory', 'USER_ID', '$filter', 'moment', 'ngProgressFactory'];
    
    function ManageItemsController(inventory, USER_ID, $filter, moment, ngProgressFactory){

        var vm = this;

        vm.progressbar = ngProgressFactory.createInstance();
        //vm.progressbar.setHeight('5px');
        vm.progressbar.start();
        
        vm.selectedFood = null;
        vm.itemGroups = [];
        vm.groceries = [];
        var currentDate = moment();

        //Perform get request to build an array of inventory items. Will need to call inventory and items.
        inventory.getAll(USER_ID)
            .then(function(response){
                vm.items = response;
                angular.forEach(vm.items, function (value, key) {
                    value.item.storage = $filter('storageType')(value.item.storage);
                    var expirationDate = moment(value.created_at).add(value.item.expiration, 'days');
                    value.daysUntilExpiration = expirationDate.diff(currentDate, 'days');
                });
                angular.forEach(vm.items, function(value, key){
                    if(vm.itemGroups.indexOf(value.item.item_name) == -1){
                        vm.itemGroups.push(value.item.item_name);
                    }
                })
                angular.forEach(vm.itemGroups, function(value, key){
                    var itemList = [];
                    var totalQuantity = 0;
                    var unit = "";
                    angular.forEach(vm.items, function(v, k){
                        if(value === v.item.item_name){
                            itemList.push(v);
                            totalQuantity += v.quantity;
                            if(unit !== v.item.measurement){
                                unit = v.item.measurement;
                            }  
                        }
                    })
                    vm.groceries.push({
                        name: value,
                        itemList: itemList,
                        total: totalQuantity,
                        unit: unit
                    })
                })
                vm.progressbar.complete();
            })

        vm.selectFood = function(food){
            vm.selectedFood = food;
        }

        vm.updateSelectedFood = function(action){

            //Update quantity/etc on selected
            //Should remove if quantity set to 0
        }

    }

})();