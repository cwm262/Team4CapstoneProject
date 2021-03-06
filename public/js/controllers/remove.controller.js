(function() {
    'use strict';

    angular
        .module('pantryApp')
        .controller('RemoveItemController', RemoveItemController);

    RemoveItemController.$inject = ['ngProgressFactory', 'alert', 'item', 'inventory', 'USER_ID', '$uibModal', '$location', '$rootScope', 'moment'];
    
    function RemoveItemController(ngProgressFactory, alert, item, inventory, USER_ID, $uibModal, $location, $rootScope, moment){

        var vm = this;

        //Creates a progress bar to be used as a loader
        vm.progressbar = ngProgressFactory.createInstance();
        vm.progressbar.setHeight('5px');

        //When a barcode is scanned, this function is called with the barcode as a parameter
        vm.barcodeScanned = function(barcode){

            //If modal open, don't process scan
            if(angular.element( document.querySelector( '.removeScannedModal' ) ).hasClass('in')){
                return;
            }
            
            if(barcode.length > 0){
                //Call DB to find out if item is in DB already
                item.getOne(barcode).then(function(response){
                    itemScanned(response[0]); //if so, proceed
                }, function(error){
                    alert.add("warning", "Barcode not found. Please try again -- or check the Manage inventory section to review inventory.");
                })
            }
        }

        //Uses emit to call function in manage controller to add focus to the search bar.
        vm.goToManualRemove = function(){
            $location.path('manage');
            $rootScope.$emit("FocusSearchBar", {});
        }

        function itemScanned(item){
            inventory.getOne(USER_ID, item.item_id).then(function(response){
                var currentDate = moment();
                var data = {
                    itemList: response
                }
                angular.forEach(data.itemList, function (value, key) {
                        var expirationDate = moment(value.created_at).add(value.item.expiration, 'days');
                        value.daysUntilExpiration = expirationDate.diff(currentDate, 'days');
                });
                var modalInstance = $uibModal.open({
                    templateUrl: "removeScanned.html",
                    resolve: {
                        grocery: data
                    },
                    controller: 'InventoryModalController',
                    controllerAs: 'mvm',
                    windowTopClass: 'removeScannedModal'
                });
            }, function(error){
                alert.add("warning", "Item not found in inventory. Consider searching on the 'Manage' page.");
            })
        }



    }

})();