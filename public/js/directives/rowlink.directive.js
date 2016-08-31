(function() {
    'use strict';

    angular
        .module('pantryApp')
        .directive('rowLink', rowLink);

    rowLink.$inject = ['$location'];
    
    function rowLink($location){
        return{
            restrict: 'A',
            link: function (scope, element, attr) {
            element.attr('style', 'cursor:pointer');
            element.on('click', function(){
                $location.path(attr.rowLink)
                scope.$apply();
            });
        }
    }
    }

})();