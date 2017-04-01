/**
 * Created by piyush sharma on 01-03-2016.
 */
'use strict';

/*Service to store Manager Profile*/
managerApp.service('_SaveModifiedManagerProfile',['$http','ModifyManagerProfileForWebApi',function($http,ModifyManagerProfileForWebApi){
    return function(managerProfile){
        managerProfile = ModifyManagerProfileForWebApi(managerProfile);
        console.log('Service',managerProfile);
        return $http({
            method : 'POST',
            url : 'api/manager/updateProfile',
            data : managerProfile
        });
    };
}]);

/*Service to store Manager Career History*/
managerApp.service('_SaveManagerCareerHistory',['$http','ModifyManagerProfileForWebApi',function($http, ModifyManagerProfileForWebApi){
    return function(managerProfile){
        managerProfile = ModifyManagerProfileForWebApi(managerProfile);
        return $http({
            method : 'POST',
            url : 'api/manager/updateCareerHistory',
            data : managerProfile
        });
    };
}]);
