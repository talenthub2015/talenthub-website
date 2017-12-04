/**
 * Created by Piyush Sharma on 12/2/2017.
 */
'use strict';
(function(managerApp){

    managerApp.controller('searchViewController', ['APP_CONSTANTS', 'searchResultService', 'managerProfileService',
        function(APP_CONSTANTS, searchResultService, managerProfileService){
            var vm = this;
            vm.countries = APP_CONSTANTS.COUNTRIES;
            vm.model = searchResultService.model;
            vm.gender = APP_CONSTANTS.GENDER;
            vm.searchTalents = searchTalents;

            activate();

            //Private Functions
            function activate(){
                initializeForm();
                managerProfileService.getProfile()
                    .then(function(managerProfile){
                       vm.managerProfile =  managerProfile;
                    });
            }

            function initializeForm() {
                vm.model.gender = vm.gender[0];
                vm.model.country = vm.countries[0];
            }

            function searchTalents(){
                searchResultService.searchTalents();
            }
        }
    ]);

})(managerApp);