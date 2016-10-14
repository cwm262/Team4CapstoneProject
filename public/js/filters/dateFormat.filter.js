(function(){
    'use strict';

    angular
        .module('pantryApp')
        .filter('dateFormat', dateFormat);

    dateFormat.$inject = ['$filter'];
    
    function dateFormat($filter){
        return function(text){
            var  tempdate= new Date(text);
            return $filter('date')(tempdate, "medium");
        }
}

})();