/**
 * Created by piyush sharma on 01-03-2016.
 */
'use strict';

managerApp.factory('_SaveModifiedManagerProfile',['$http',function($http){
    return function(managerProfile){
        if(!(managerProfile instanceof Manager))
        {
            return false;
        }
        console.log('Service-Past',managerProfile);
        managerProfile.country = managerProfile.country.getCountryName();
        console.log('Service',managerProfile);
        return $http({
            method : 'POST',
            url : 'api/manager/updateProfile',
            data : managerProfile
        });
    };
}]);
