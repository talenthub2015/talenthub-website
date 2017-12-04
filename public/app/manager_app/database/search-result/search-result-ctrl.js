/**
 * Created by Piyush Sharma on 12/2/2017.
 */
'use strict';
(function(managerApp){

    managerApp.controller('searchResultController', ['searchResultService',
        function(searchResultService){
            var vm = this;
            vm.searchResult = searchResultService.searchResult;

            activate();

            //Private functions
            function activate(){

            }
        }
    ]);

})(managerApp);