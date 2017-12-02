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
        .state('profile.readonlyview',{
            url: '/view/:profileId',
            params : {
                profileId : {
                    value: null,
                    squash:true
                },
                readOnlyView : true
            },
            templateUrl : 'app/manager_app/profile/index-readonly.html'
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
                    templateUrl:'app/manager_app/verification/form/coach-scout-verification.html'
                },
                'scout' :{
                    url:'/scout',
                    templateUrl:'app/manager_app/verification/form/coach-scout-verification.html'
                },
                'agent' :{
                    url:'/agent',
                    templateUrl:'app/manager_app/verification/form/agent-verification.html'
                }
            }
        })
        //Help Center
        .state('help-centre',{
            url:'/help-centre',
            templateUrl: "app/manager_app/help-centre/help-centre.html",
            controller: 'helpCentreController',
            controllerAs: 'helpVm'
        })
        //Database
        .state('database',{
            abstract: true,
            url:'/database',
            templateUrl: '/app/manager_app/database/index.html'
        })
        .state('database.search',{
            url:'/search',
            views: {
                'searchSection': {
                    templateUrl:'/app/manager_app/database/search-view/search-view.html',
                    controller:'searchViewController',
                    controllerAs:'searchVm'
                },
                'searchResult': {
                    templateUrl:'/app/manager_app/database/search-result/search-result.html',
                    controller:'searchResultController',
                    controllerAs:'resultVm'
                }
            }
        });
}]);

/*Defining App Values and Constants
 */
managerApp.constant('App_Events',{
    ShowLoadingOverlay : 'show_loading_overlay',
    HideLoadingOverlay : 'hide_loading_overlay',
    ManagerModelUpdated : 'manager_model_updated'
});

managerApp.constant('_', window._);

managerApp.run(function($rootScope,UpdateURLService,GetBasicSiteConstants){
    /*Defining Basic Site Constants*/
    $rootScope.basicSiteConstants = {
        countries : undefined
    };
    UpdateURLService();
    GetBasicSiteConstants();
});
