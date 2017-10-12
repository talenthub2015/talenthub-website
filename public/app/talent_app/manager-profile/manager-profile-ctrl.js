/**
 * Created by Piyush Sharma on 8/13/2017.
 */
'use strict';

talentApp.controller('ManagerProfileController',['$scope','$http', '_', 'managerProfileService','$stateParams', 'talentProfileService',
    function($scope,$http, _, managerProfileService, $stateParams, talentProfileService){
        var vm = this;

        vm.sampleMessageModalId = "sampleMessageModal";
        vm.model = managerProfileService.profileModel;
        vm.isLoading = isLoading;
        vm.buildAchievement = buildAchievement;
        vm.isManagerVerified = isManagerVerified;
        vm.showSampleMessage = showSampleMessage;
        vm.talentProfile = talentProfileService.model;

        activate();

        function activate(){
            vm.isReadOnly = _.get($stateParams, 'readOnlyView');

            managerProfileService.getProfile($stateParams.profileId);

            talentProfileService.getTalentProfile();
        }

        function isLoading(){
            return managerProfileService.loading;
        }

        function buildAchievement(careerHistory, achievement){
            return careerHistory.career_year + " : " + achievement.achievement;
        }

        function isManagerVerified(){
            return _.get(vm.model, 'verification.verificationStatus');
        }

        function showSampleMessage(){
            $('#' + vm.sampleMessageModalId).modal('show');
        }
    }]);