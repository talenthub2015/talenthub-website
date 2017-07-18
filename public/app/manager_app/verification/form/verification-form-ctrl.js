/**
 * Created by Piyush Sharma on 4/19/2017.
 */
'use strict';

managerApp.controller('verificationFormController',['managerProfileViewService','verificationService', 'APP_CONSTANTS',
    function(managerProfileViewService, verificationService, APP_CONSTANTS){
    var vm = this;
    vm.model = verificationService.model;

    vm.submitForm = submitForm;
    vm.listOfCountries = APP_CONSTANTS.COUNTRIES;
    vm.appConstants = APP_CONSTANTS;
    activate();

    function activate(){
        vm.managerProfile = managerProfileViewService.getManagerProfile()
            .then(function(managerProfile){
                vm.model.sportType = managerProfile.sport_type;
            });
    }

    function submitForm(){
        verificationService.submitVerificationRequest()
            .then(function(){
                //Redirect the Home Page
            });
    }
}]);
