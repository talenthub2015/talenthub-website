/**
 * Created by piyush sharma on 03-03-2016.
 */
'use strict';

managerApp.directive('loadingRequest',['App_Events',function(App_Events){
    return {
        restrict: 'E',
        templateUrl : 'app/directive/request_loading.html',
        controller : ['$scope',function($scope){
            $scope.requestLoading = false;
            //Showing Loading Overlay
            $scope.$on(App_Events.ShowLoadingOverlay,function(event){
                $scope.requestLoading = true;
            });
            //Hiding Loading Overlay
            $scope.$on(App_Events.HideLoadingOverlay, function(event){
                console.log('Overlay','Hide');
                $scope.requestLoading = false;
            });
        }]
    };

}]);