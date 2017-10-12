/**
 * Created by piyush sharma on 21-02-2016.
 */
'use strict';
managerApp.controller('ManagerProfileController',['$scope','$http','App_Events','verificationService','_',
    'managerProfileService','$stateParams',
    function($scope,$http, App_Events, verificationService, _, managerProfileService, $stateParams){
        var vm = this;

        vm.model = managerProfileService.profileModel;
        vm.showVerificationButton = showVerificationButton;
        vm.isLoading = isLoading;
        vm.buildAchievement = buildAchievement;
        vm.isManagerVerified = isManagerVerified;

        activate();

        function activate(){
            vm.isReadOnly = _.get($stateParams, 'readOnlyView');
            $scope.$broadcast(App_Events.ShowLoadingOverlay);

            managerProfileService.getProfile($stateParams.profileId)
                .then(function(profileData){
                    verificationService.getVerificationRequest(profileData.profile_id)
                        .then(function(){
                            $scope.$broadcast(App_Events.HideLoadingOverlay);
                        });
                });
        }

        function showVerificationButton(){
            return !_.get(verificationService.model, 'id');
        }

        function isLoading(){
            return managerProfileService.loading || verificationService.loading;
        }

        function buildAchievement(careerHistory, achievement){
            return careerHistory.career_year + " : " + achievement.achievement;
        }

        function isManagerVerified(){
            return _.get(verificationService.model, 'verificationStatus');
        }
    }]);


/*Controller to Edit Manager Profile*/
managerApp.controller('ManagerEditProfileController',['$scope','$http','$rootScope','_SaveModifiedManagerProfile',
    'App_Events','$location','managerProfileService',
    function($scope,$http,$rootScope,_SaveModifiedManagerProfile,App_Events,$location, managerProfileService){
        $scope.managerProfile = $rootScope.managerProfile;
        //Boolean to check, if form submitted or not
        $scope.formSubmitted = false;


        /*Initializing page*/
        var init = function(){
            $("form").find(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1950:c'
            });

            managerProfileService.getProfile()
                .then(function(profileData){
                    $scope.managerProfile = profileData;
                });
        };

        init();

        //Updating Models
        $scope.$on(App_Events.ManagerModelUpdated,function(){
            $scope.managerProfile = $rootScope.managerProfile;
            console.log('Manager Profile updated',$scope.managerProfile);
        });

        //Submit Request to app, for updating Manager Profile Info
        $scope.saveManagerProfile = function(){
            $rootScope.$broadcast(App_Events.ShowLoadingOverlay);
            $scope.formSubmitted=true;
            console.log('Manager Profile',$scope.managerProfile);
            try
            {
                _SaveModifiedManagerProfile($scope.managerProfile).
                    then(function(response){
                        $location.path('/profile/edit/career');
                    },function(){

                    })
                    .finally(function(){
                        $rootScope.$broadcast(App_Events.HideLoadingOverlay);
                    });
            }
            catch(exception)
            {

            }
        };
    }
]);



/*Controller for Manager Career History*/
managerApp.controller('ManagerCareerHistoryController',['$scope','$rootScope','$location','App_Events',
    '_SaveManagerCareerHistory','managerProfileService','_',
    function($scope,$rootScope,$location,App_Events,_SaveManagerCareerHistory, managerProfileService, _){
        //Form Interaction variables
        $scope.formSubmitted = false;
        $scope.careerYearRange = [];

        activate();

        function activate(){
            $scope.getNgMessageErrorModel = getNgMessageErrorModel;
            managerProfileService.getProfile()
                .then(function(profileData){
                    $scope.managerProfile = profileData;
                });
        }
        var currentYear = new Date();
        currentYear = parseInt(currentYear.getFullYear());
        for(var i=currentYear;i>(currentYear-100);i--)
        {
            $scope.careerYearRange.push(i.toString());
        }

        //Updating Models, if rootScope model updated
        $scope.$on(App_Events.ManagerModelUpdated,function(){
            console.log('Updated Manager profile',$rootScope.managerProfile);
            $scope.managerProfile = $rootScope.managerProfile;
            // $scope.managerProfile.careerHistory[0].year = 2015;
            // $scope.managerProfile.institution_name="Some random name";
        });

        //Adding Another Achievement in Career History
        $scope.addAnotherAchievement = function(careerHistory){
            careerHistory.achievements.push({
                achievement:""
            });
        };
        //Removing Achievement
        $scope.removeAchievement = function(careerHistory,achievement){
            if(careerHistory.achievements.length > 1)
                _.remove(careerHistory.achievements, function(achieve){
                    console.log('Is Equal -' + achieve, _.isEqual(achieve, achievement));
                    return _.isEqual(achieve, achievement);
                });
            else
                alert('At least one achievement should be there for a year');
        };
        //Adding New Career History to the Manager Profile
        $scope.addAnotherYear = function(){
            var newCareerHistory = {
                achievements:[]
            };
            $scope.addAnotherAchievement(newCareerHistory);

            $scope.managerProfile.career_history.push(newCareerHistory);
        };
        //Removing Career History
        $scope.removeCareerHistory = function(careerHistory){
            if(confirm('Are you sure to remove this year'))
            {
                _.remove($scope.managerProfile.career_history, function(ch){
                    return _.isEqual(ch, careerHistory);
                });
            }
        };

        //Save Career History of the manager
        $scope.saveManagerCareerHistory = function(managerProfile){
            $rootScope.$broadcast(App_Events.ShowLoadingOverlay);
            console.log('Manager Profile Career History', managerProfile);
            _SaveManagerCareerHistory(managerProfile).
            then(function(response){
                $location.path('/');
                console.log('History Saved',response);
            },function(response){
                console.log('History Saved failed',response);
            })
                .finally(function(){
                    $rootScope.$broadcast(App_Events.HideLoadingOverlay);
            });
        };

        function getNgMessageErrorModel(form, parentIndex, fieldName, fieldIndex){
            var formFieldName = parentIndex + fieldName + fieldIndex;
            return form[formFieldName].$error;
        }

}]);