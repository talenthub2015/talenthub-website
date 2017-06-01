/**
 * Created by Piyush Sharma on 01/04/2017.
 */
'use strict';
managerApp.service('verificationService', ['managerProfileViewService',
    function (managerProfileViewService){

        var service;

        service = {
            model :{},
            getManagerType : getManagerType,
            getVerificationStatus : getVerificationStatus,
            submitVerificationRequest : submitVerificationRequest,
            getVerificationFormModel : getVerificationFormModel
        }

        return service;

        function getManagerType(){
            return managerProfileViewService.getManagerProfile().
                then(function(){
                    return managerProfileViewService.model.user_type;
            });
        }

        function getVerificationStatus(){

        }

        function submitVerificationRequest(){

        }

        function getVerificationFormModel(){

        }
    }]);

