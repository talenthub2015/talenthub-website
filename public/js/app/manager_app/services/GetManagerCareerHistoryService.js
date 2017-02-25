/**
 * Created by Piyush on 4/8/2016.
 */
'use strict';
managerApp.factory('GetManagerCareerHistoryService',['$http',function($http){
    return function(){
        return $http({
            method : 'GET',
            url : 'api/manager/getCareerHistory'
        });
    };
}]);
