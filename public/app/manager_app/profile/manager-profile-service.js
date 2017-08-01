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

        function getProfile(){
            service.loading = true;
            return $http({
                method : 'GET',
                url : 'api/manager/profile',
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
        function mapProfileData(profileData){
            service.profileModel = _.merge(service.profileModel, profileData);
        }
    }
]);
