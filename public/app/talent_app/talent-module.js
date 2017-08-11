/**
 * Created by Piyush Sharma on 8/11/2017.
 */
'use strict';
var talentApp;
(function(){
    talentApp = angular.module('thub.talentApp',['thub.manager_app','ngCookies','ngSanitize','ngMessages', 'ui.router'])

    talentApp.config(['$stateProvider', '$urlRouterProvider',function($stateProvider, $urlRouterProvider){

        $urlRouterProvider.otherwise('/profile/view');

        $stateProvider
            .state('manager',{
                abstract:true,
                url:"/manager",
                templateUrl : 'app/manager_app/profile/profile-view.html',

            })
            .state('manager.profile',{
                url: '/profile/:profileId',
                params : {
                    profileId:{
                        value:null,
                        squash:true
                    },
                    readOnlyView : true
                },
                templateUrl : 'app/manager_app/profile/index-readonly.html'
            });
    }]);
})();