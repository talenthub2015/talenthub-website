/**
 * Created by Piyush Sharma on 12/4/2017.
 */
'use strict';
(function(managerApp){

    managerApp.service('searchResultService', ['$http',
        function($http){
            var service = {
                model: {},
                searchResult: {},
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
                        service.searchResult = response.data;
                        return service.searchResult;
                    },
                    function(response){
                        throw new Error('Request failed: ', response);
                    });
            }
        }
    ]);

})(managerApp);
