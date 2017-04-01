/**
 * Created by piyush sharma on 08-02-2016.
 */
'use strict';

var managerApp = angular.module('thub.manager_app',['ngCookies','ngSanitize','ngMessages', 'ui.router']);

/* Configuring Manager App
    - Defining App Routes
 */
managerApp.config(['$stateProvider', '$urlRouterProvider',function($stateProvider, $urlRouterProvider){

    $urlRouterProvider.otherwise('/profile/view');

    $stateProvider
        .state('profile',{
            url: '/profile',
            templateUrl : 'app/manager_app/profile/profile-view.html',
            redirectTo : 'profile.view'
        })
        .state('profile.view',{
            url: '/view',
            templateUrl : 'app/manager_app/profile/index.html'
        })
        .state('profile.edit',{
            url:'/edit',
            templateUrl: 'app/manager_app/profile/edit.html'
        })
        .state('profile.career',{
            url:'/edit/career',
            templateUrl: 'app/manager_app/profile/edit-career-history.html'
        })
        .state('profile.verification',{
            url:'/verification',
            templateUrl:'app/manager_app/verification/request-verification.html'
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
