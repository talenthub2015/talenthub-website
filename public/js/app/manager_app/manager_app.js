/**
 * Created by piyush sharma on 08-02-2016.
 */
'use strict';

var managerApp = angular.module('thub.manager_app',['ngCookies','ngSanitize','ngMessages', 'ui.router']);

/* Configuring Manager App
    - Defining App Routes
 */
managerApp.config(['$stateProvider', '$urlRouterProvider',function($stateProvider, $urlRouterProvider){
    // $routeProvider.
    //     when('/',{
    //         templateUrl :   'app/manager_app/profile/index.html'
    //     })
    //     //Manager Profile Edit pages
    //     .when('/profile/edit',{
    //         templateUrl :   'app/manager_app/profile/edit.html'
    //     })
    //     .when('/profile/edit/career',{
    //         templateUrl :    'app/manager_app/profile/edit-career-history.html'
    //     })

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
