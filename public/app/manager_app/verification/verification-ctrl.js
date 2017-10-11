/**
 * Created by Piyush Sharma on 29/03/2017.
 */
'use strict';
    managerApp.controller('verificationController', ['verificationService',
        function verificationController(verificationService){
            var vm = this;

            activate();

            function activate()
            {
                verificationService.getManagerType()
                    .then(function(managerType){
                        vm.managerType = managerType;
                    });
            }
        }]);

