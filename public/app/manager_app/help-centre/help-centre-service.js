/**
 * Created by Piyush Sharma on 11/4/2017.
 */
'use strict';
(function(managerApp){

    managerApp.service('helpCentreService', ['$http',
        function($http){

            var service = {
                model : {},
                submitQuery : submitQuery
            };

            return service;

            //Private Functions
            function submitQuery(){
                return $http.post('api/manager/help-centre', service.model)
                    .then(function(response){
                        return response.data;
                    },
                    function(response){
                        throw new Error('Unable to submit query', response);
                    });
            }

        }
    ]);

})(managerApp);
