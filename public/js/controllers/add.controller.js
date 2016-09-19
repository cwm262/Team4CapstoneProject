(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('AddItemController', AddItemController);

    AddItemController.$inject = ['grocery', 'ngProgressFactory', '$location'];
    
    function AddItemController(grocery, ngProgressFactory, $location){

        var vm = this;

        vm.recentlyAdded = [];

        //Dummy data below.
        vm.groceryItem = {
            quantity: 4,
            name: "Bananas",
        }
        vm.recentlyAdded.push(vm.groceryItem);
        vm.groceryItem = {
            quantity: 1,
            name: "Campbell's Tomato Soup"
        }
        vm.recentlyAdded.push(vm.groceryItem);
        vm.lastScannedItem = _.last(vm.recentlyAdded);
        vm.selectedItem = vm.lastScannedItem;

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

        //Can't scan item. Go to manual input.
        vm.goToManualInput = function(){
            $location.path('add-items/manual');
        }

        //Item is selected from table view. Change to current selected item. Change slider value.
        vm.selectItem = function(item){
            vm.selectedItem = item;
            vm.slider.value = vm.selectedItem.quantity;
        }

        vm.itemScanned = function(){
            //Push to recentlyAdded array. Make current selectedItem.
        }

        vm.addToGroceries = function(selectedItem){
            selectedItem.quantity = vm.slider.value;
            selectedItem.submitted = true;
            var data = {
                //Build with values from selectedItem
                
            }
            //NOTE: Call to /items to see if item has been registered to db. Add if it has not.
            //Use to post item to DB once submit is pressed. Adds to Groceries in Inventory table.
            // grocery.post(data).then(function(response){
            //     selectedItem.quantity = vm.slider.value;
            // }, function(error){
            //     $location.path('add-items');
            //     alert.add("danger", "Failed to add grocery item: " + error.data.message);
            // })
        }

    }

})();