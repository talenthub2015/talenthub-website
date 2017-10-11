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

/*Getting List of Sports Available in the application*/
managerApp.factory('GetListOfSports',['$http',function($http){
    return function(){
        return $http({
            method : 'GET',
            url : 'api/general/list-of-sports'
        });
    };
}]);

/*Requesting Dropdown options, and other Site Constants required at Fron End
* Eg., List of Countries,
* */
managerApp.factory('GetBasicSiteConstants',['$http','$rootScope','GetListOfSports',function($http,$rootScope,GetListOfSports){
    return function(){
        $http({
            method : 'GET',
            url : 'api/general/basic-site-constants',
            cache:true
        })
            .then(
            function(response){
                //console.log("Success",response);
                $rootScope.basicSiteConstants.countries = response.data.countries_list;
            },
            function(response){
                console.log('Error',response);
            }
        );

        //Getting List of Sports
        GetListOfSports().then(
            function(response){
                console.log('Sport',response);
                $rootScope.basicSiteConstants.sports = response.data.sports;
            },
            function(response){
                console.log('Error while getting Sport List',response);
            }
        );
    };
}]);

/*Extracting Manager Profile*/
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
                console.log("Success",response);
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

//Updating Manager Career History in the Angular Model (Client Side)
managerApp.factory('UpdateManagerCareerHistory',['$rootScope','GetManagerCareerHistoryService','App_Events',
    function($rootScope,GetManagerCareerHistoryService,App_Events){
    return function(){
        GetManagerCareerHistoryService().
        then(
            function(response){
                console.log("Career History",response);
                $rootScope.managerProfile.updateCareerHistory(response.data.careerHistory);
                $rootScope.$broadcast(App_Events.ManagerModelUpdated);
                return true;
            },
            function(response){
                console.log("Failed Career History",response);
                return false;
            }
        );
    };
}]);


/*Modify Manager Profile to make it compatible for WEB API*/
managerApp.factory('ModifyManagerProfileForWebApi',[function(){
    return function(managerProfile)
    {
        var modifiedManagerProfile = angular.copy(managerProfile);
        return modifiedManagerProfile;
    }
}]);