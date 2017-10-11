/**
 * Created by Piyush Sharma on 4/19/2017.
 */
'use strict';

managerApp.controller('verificationFormController',
    ['managerProfileService','verificationService', 'APP_CONSTANTS','$state','_',
    function(managerProfileService, verificationService, APP_CONSTANTS, $state, _){
        var vm = this;
        vm.model = verificationService.model;

        vm.submitForm = submitForm;
        vm.isCoach = isCoach;
        vm.isScout = isScout;
        vm.isAgent = isAgent;
        vm.listOfCountries = APP_CONSTANTS.COUNTRIES;
        vm.appConstants = APP_CONSTANTS;
        activate();

        function activate(){
            managerProfileService.getProfile()
                .then(function(managerProfile){
                    vm.managerProfile = managerProfile;
                    vm.model.sportType = managerProfile.sport_type;
                    vm.model.user_type = managerProfile.user_type;
                });
        }

        function submitForm(){
            verificationService.submitVerificationRequest()
                .then(function(){
                    $state.go('profile.view');
                });
        }

        function isCoach(){
            var userType = _.get(vm, 'managerProfile.user_type');
            if(userType)
                return userType.toLowerCase() === 'coach';

            return false;
        }

        function isScout(){
        var userType = _.get(vm, 'managerProfile.user_type');
        if(userType)
            return userType.toLowerCase() === 'scout';

        return false;
    }

        function isAgent(){
            var userType = _.get(vm, 'managerProfile.user_type');
            if(userType)
                return userType.toLowerCase() === 'agent';

            return false;
        }
}]);
