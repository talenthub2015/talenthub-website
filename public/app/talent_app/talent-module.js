/**
 * Created by Piyush Sharma on 8/11/2017.
 */
'use strict';
var talentApp;
(function(){
    talentApp = angular.module('thub.talentApp',['ngCookies','ngSanitize','ngMessages', 'ui.router', 'thub.appCommonModule'])

    talentApp.config(['$stateProvider', '$urlRouterProvider',
        function($stateProvider, $urlRouterProvider){

            var profileUrl = "/profile";
            $urlRouterProvider.otherwise(function(){
                window.location.href = profileUrl;
            });

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

    talentApp.constant('_', window._);
})();