var talentProfile = angular.module('talentProfile',[]);

//For Updating User's Profile data i.e. First name, last name, about,etc.
talentProfile.controller('UserProfileUpdate',['$scope','ProfileOperationService',function($scope,ProfileOperationService){

    $scope.updateProfileData = function(){
        var data = {
            fname   :   $scope.fname,
            lname   :   $scope.lname,
            dob     :   $scope.dob,
            country :   $scope.country,
            sport_preferred_position :  $scope.sport_preferred_position,
            about   :   $scope.about
        };
        ProfileOperationService(data,'profile/uploadImage').success(function(data){
            alert("f:" + data);
        });
    };
}]);

talentProfile.factory('ProfileOperationService',['$http',function($http){

    return function(data,url)
    {
      return $http.put(url,
          {
              data:data
          })
          .success(function(data){

          })
          .error(function(data){

          });
    };

}]);

