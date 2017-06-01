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
            abstract:true,
            url:"/profile",
            templateUrl : 'app/manager_app/profile/profile-view.html',

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
        .state('verification',{
            abstract: true,
            url:'/verification',
            templateUrl:'app/manager_app/verification/verification-view.html'
        })
        .state('verification.request',{
            url:'/request',
            templateUrl:'app/manager_app/verification/request-verification.html',
            controller: 'verificationController'
        })
        .state('verification.form',{
            abstract:true,
            url:'/form',
            templateUrl:'app/manager_app/verification/form/request-verification-form.html',
            controller: 'verificationFormController',
            controllerAs:'verificationFmVm'
        })
        .state('verification.form.manager_type',{
            url:'/manager',
            views :{
                'coach' :{
                    url:'/coach',
                    templateUrl:'app/manager_app/verification/form/coach-verification.html'
                }
            }
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
