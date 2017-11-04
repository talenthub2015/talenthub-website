/**
 * Created by Piyush Sharma on 11/4/2017.
 */
'use strict';
(function(managerApp){

    managerApp.controller('helpCentreController', ['helpCentreService',
        function(helpCentreService){
            var vm = this;
            vm.model = helpCentreService.model;
            vm.submitQuery = submitQuery;
            vm.querySubmittedSuccessfully = false;

            //Private Functions
            function submitQuery(){
                helpCentreService.submitQuery()
                    .then(function(){
                        vm.querySubmittedSuccessfully = true;
                    });
            }
        }
    ]);

})(managerApp);
