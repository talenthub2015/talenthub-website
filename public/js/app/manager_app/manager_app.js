/**
 * Created by piyush sharma on 08-02-2016.
 */
'use strict';

var managerApp = angular.module('thub.manager_app',['ngCookies','ngRoute','ngSanitize','ngMessages']);

/* Configuring Manager App
    - Defining App Routes
 */
managerApp.config(['$routeProvider',function($routeProvider){
    $routeProvider.
        when('/',{
            templateUrl :   'app/manager_app/profile/index.html'
        })
        //Manager Profile Edit pages
        .when('/profile/edit',{
            templateUrl :   'app/manager_app/profile/edit.html'
        })
        .when('/profile/edit/career',{
            templateUrl :    'app/manager_app/profile/edit-career-history.html'
        })
}]);

/*Defining App Values and Constants
 */
managerApp.constant('App_Events',{
    ShowLoadingOverlay : 'show_loading_overlay',
    HideLoadingOverlay : 'hide_loading_overlay',
    ManagerModelUpdated : 'manager_model_updated'
});

managerApp.run(function($rootScope,UpdateURLService,UpdateManagerProfile,GetBasicSiteConstants){
    /*Defining Basic Site Constants*/
    $rootScope.basicSiteConstants = {
        countries : undefined
    };
    UpdateURLService();
    GetBasicSiteConstants();
});
