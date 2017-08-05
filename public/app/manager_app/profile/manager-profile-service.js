/**
 * Created by Piyush Sharma on 7/30/2017.
 */
'use strict';

managerApp.service('managerProfileService', ['_','$http',
    function(_, $http){
        var service = {
            profileModel : {},
            loading : false,
            getProfile : getProfile,
        };
        return service;

        function getProfile(profileId){
            var url = getUrl(profileId);
            service.loading = true;
            return $http({
                method : 'GET',
                url : url,
                cache : true
                })
                .then(function(response){
                    mapProfileData(response.data);
                    service.loading = false;
                    return service.profileModel;
                },
                function(response){
                    service.loading = false;
                });
        }

        //Private method
        function getUrl(profileId){
            if(!_.isEmpty(profileId))
            {
                return "api/manager/profile/"+profileId;
            }
            return "api/manager/profile";
        }
        function mapProfileData(profileData){
            service.profileModel = _.merge(service.profileModel, profileData);
        }
    }
]);
