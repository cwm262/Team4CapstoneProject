(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('RemoveItemController', RemoveItemController);

    RemoveItemController.$inject = ['grocery', 'ngProgressFactory', '$location', 'item'];
    
    function RemoveItemController(grocery, ngProgressFactory, $location, item){

        var vm = this;

        vm.recentlyRemoved = [];

        //Dummy data below.
        // vm.groceryItem = {
        //     quantity: 4,
        //     name: "Bananas",
        //     total: 6
        // }
        // vm.recentlyRemoved.push(vm.groceryItem);
        // vm.groceryItem = {
        //     quantity: 1,
        //     name: "Campbell's Tomato Soup",
        //     total: 3
        // }
        // vm.recentlyRemoved.push(vm.groceryItem);
        // vm.lastScannedItem = _.last(vm.recentlyRemoved);
        // vm.selectedItem = vm.lastScannedItem;

        //Build option floor and ceil from db data somehow?
        vm.slider = {
            value: 6,
            options: {
                floor: 1,
                ceil: 12
            }
        };        
        //vm.progressbar = ngProgressFactory.createInstance();
        //vm.progressbar.setHeight('5px');
        //vm.progressbar.start();

        //Can't scan item. Go to manual remove
        vm.goToManualRemove = function(){
            $location.path('remove-items/manual');
        }

        //Item is selected from table view. Change to current selected item. Change slider value.
        vm.selectItem = function(item){
            vm.selectedItem = item;
            vm.slider.value = vm.selectedItem.quantity;
        }

        vm.itemScanned = function(){
            //Push to recentlyRemoved array. Make current selectedItem.
        }

        vm.removeFromGroceries = function(selectedItem){
            selectedItem.quantity = vm.slider.value;
            selectedItem.submitted = true;

            //var id = selectedItem.id;
            //Use to post item to DB once submit is pressed. Remove groceries from Inventory table.
            // grocery.remove(data).then(function(response){
            //     selectedItem.quantity = vm.slider.value;
            // }, function(error){
            //     $location.path('remove-items');
            //     alert.add("danger", "Failed to remove grocery item: " + error.data.message);
            // })
        }

    }

})();