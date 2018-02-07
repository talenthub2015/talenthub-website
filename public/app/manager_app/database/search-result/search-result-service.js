/**
 * Created by Piyush Sharma on 12/4/2017.
 */
'use strict';
(function(managerApp){

    managerApp.service('searchResultService', ['$http', '_',
        function($http){
            var service = {
                model: {},
                searchResult: [],
                searchTalents : searchTalents
            };
            return service;

            //Private Function
            function searchTalents(){
                $http({
                    url: 'api/manager/search-talent',
                    method: 'GET',
                    params: service.model
                })
                    .then(function(response){
                        _.assign(service.searchResult, response.data);
                        return service.searchResult;
                    },
                    function(response){
                        throw new Error('Request failed: ', response);
                    });
            }
        }
    ]);

})(managerApp);
