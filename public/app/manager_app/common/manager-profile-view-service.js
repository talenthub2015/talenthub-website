/**
 * Created by Piyush Sharma on 01/04/2017.
 */
'use strict';
managerApp.service('managerProfileViewService',['$http',function($http){
    var service = {
        model : {},
        getManagerProfile : getManagerProfile
    };

    return service;

    function getManagerProfile(){
        return $http.get('api/manager/profile',{
            cache : true
        })
            .then(function(response){
                service.model = response.data;
            });
    }
}]);
