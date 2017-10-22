/**
 * Created by Piyush Sharma on 10/11/2017.
 */

'use strict';

(function(talentApp){
    talentApp.service('talentProfileService',['$http', '_',
        function($http, _){
            var service = {
                model : {},
                loading : false,
                getTalentProfile : getTalentProfile
            };

            return service;

            //Private Function
            function getTalentProfile(){
                service.loading = true;
                return $http({
                    method: 'GET',
                    url: 'api/common/active-user'
                })
                    .then(function(response){
                        _.merge(service.model, response.data);
                        return service.model;
                    })
                    .finally(function(){
                        service.loading = false;
                    });
            }
        }
    ])
})(talentApp);