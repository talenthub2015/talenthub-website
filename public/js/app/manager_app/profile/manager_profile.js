/**
 * Created by piyush sharma on 21-02-2016.
 */
'use strict';
managerApp.controller('ManagerProfileController',['$scope','$http',function($scope,$http){
    $scope.first_name = "";
    $scope.last_name = "";
    $scope.email = "";
    $scope.user_id = "";

    $http({
        method : 'GET',
        url : 'api/manager/profile'
    })
        .then(
        function(response){
            console.log('success',response);
        },
        function(response){
            console.log('Error',response);
        }
    );
}]);


/*Controller to Edit Manager Profile*/
managerApp.controller('ManagerEditProfileController',['$scope','$http','$rootScope','_SaveModifiedManagerProfile',
    'App_Events','$location',
    function($scope,$http,$rootScope,_SaveModifiedManagerProfile,App_Events,$location){
        $scope.managerProfile = $rootScope.managerProfile;
        console.log('ManagerProfile',$scope.managerProfile);
        //Boolean to check, if form submitted or not
        $scope.formSubmitted = false;


        /*Initializing page*/
        var init = function(){
            $("form").find(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1950:c'
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
                _SaveModifiedManagerProfile($rootScope.managerProfile).
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
managerApp.controller('ManagerCareerHistoryController',['$scope','$rootScope','$location','App_Events'
    ,function($scope,$rootScope,$location,App_Events){
        $scope.managerProfile = $rootScope.managerProfile;
        $scope.careerYearRange = [];
        var currentYear = new Date();
        currentYear = currentYear.getFullYear();
        for(var i=currentYear;i>(currentYear-100);i--)
        {
            $scope.careerYearRange.push(i);
        }

        //Updating Models, if rootScope model updated
        $scope.$on(App_Events.ManagerModelUpdated,function(){
            $scope.managerProfile = $rootScope.managerProfile;
        });

        //Adding Another Achievement in Career History
        $scope.addAnotherAchievement = function(careerHistory){
            careerHistory.addAnAchievement({info:""});
        };
        //Removing Achievement
        $scope.removeAchievement = function(careerHistory,achievement){
            careerHistory.removeAchievement(achievement);
        };
        //Adding New Career History to the Manager Profile
        $scope.addAnotherYear = function(){
            console.log('Adding new History');
            $scope.managerProfile.addCareerHistory(new ManagerCareerHistory());
        };
        //Removing Career History
        $scope.removeCareerHistory = function(careerHistory){
            $scope.managerProfile.removeCareerHistory(careerHistory);
        };

}]);