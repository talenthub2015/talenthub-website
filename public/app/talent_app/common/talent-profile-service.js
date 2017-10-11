/**
 * Created by Piyush Sharma on 10/11/2017.
 */

'use strict';

(function(talentApp){
    talentApp.service('talentProfileService',['$http',
        function($http){
            var service = {
                model : {},
                getTalentProfile : getTalentProfile
            };

            return service;

            //Private Function
            function getTalentProfile(){
                $http({
                    method: 'GET',
                    url: 'api/common/active-user'
                })
                    .then(function(response){
                        //TODO :: Add Mapping from Server side to client side
                        //service.model = response.data;
                    });
            }
        }
    ])
})(talentApp);