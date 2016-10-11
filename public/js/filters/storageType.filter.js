(function(){
    'use strict';

    angular
        .module('pantryApp')
        .filter('storageType', storageType);

    storageType.$inject = [];
    
    function storageType(){

        var storageTypeArray = [
            'Freezer',
            'Refrigerator',
            'Pantry'
        ];

        return function(value) {
            return storageTypeArray[value];
        }
    }

})();