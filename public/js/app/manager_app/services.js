/**
 * Created by piyush sharma on 16-02-2016.
 */
'use strict';

/*Checking if any intended URL set in Cookies
* If Yes, then redirecting to that URL*/
managerApp.factory('UpdateURLService',['$location','$cookies',function($location,$cookies){

    return function(){
        //console.log($cookies);
        if($cookies[CookieEnum.IntendedURL] && ($cookies[CookieEnum.IntendedURL]).length > 0)
        {
            $location.url($cookies[CookieEnum.IntendedURL]);
            $cookies[CookieEnum.IntendedURL] = "";
            return true;
        }
        return false;
    };
}]);

/*Requesting Dropdown options, and other Site Constants required at Fron End
* Eg., List of Countries,
* */
managerApp.factory('GetBasicSiteConstants',['$http','$rootScope','UpdateManagerProfile',function($http,$rootScope,UpdateManagerProfile){
    return function(){
        $http({
            method : 'GET',
            url : 'api/general/basic-site-constants'
        })
            .then(
            function(response){
                //console.log("Success",response);
                $rootScope.basicSiteConstants.countries = response.data.countries_list;
                console.log("Countries List:", $rootScope.basicSiteConstants.countries);
                UpdateManagerProfile();
            },
            function(response){
                console.log('Error',response);
            }
        );
    };
}]);

/*Extracing Manager Profile*/
managerApp.factory('UpdateManagerProfile',['$http','$rootScope','App_Events',function($http,$rootScope,App_Events){
    return function(){
        if(!Object.prototype.hasOwnProperty.call($rootScope, 'managerProfile'))
        {
            $rootScope.managerProfile = new Manager();
        }
        $http({
            method : 'GET',
            url : 'api/manager/profile'
        })
            .then(
            function(response){
                //console.log("Success",response);
                $rootScope.managerProfile.setManager(response.data,$rootScope);
                //console.log("Profile",$rootScope.managerProfile);
                $rootScope.$broadcast(App_Events.ManagerModelUpdated);
                return true;
            },
            function(response){
                console.log('Error',response);
                $rootScope.response_error = response;
                return false;
            }
        );
    };
}]);