/**
 * Created by Piyush Sharma on 01/04/2017.
 */
'use strict';
managerApp.service('verificationService', ['managerProfileViewService', '$http', '$q',
    function (managerProfileViewService, $http, $q){

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
            return $q.all([submitVerificationRequestOnlyData(),
                submitVerificationRequestFiles()])
                .then(function(response){

                });
        }

        function submitVerificationRequestOnlyData(){
            return $http({
                url: 'api/manager/verification-request',
                method: "PUT",
                data: service.model
            })
                .then(function(response) {
                    console.log("Verification Request Response :", response);
                });
        }

        function submitVerificationRequestFiles(){
            var fileFormData = createFileFormData(service.model.files);
            return $http({
                url: 'api/manager/verification-request-files-upload',
                method: "POST",
                data: fileFormData,
                headers: {'Content-Type': undefined},
                transformRequest    : angular.identity
            })
                .then(function(response) {
                    console.log("Verification Request Response :", response);
                });
        }

        function getVerificationFormModel(){

        }

        //Private Methods
        function createFileFormData(files){
            var fileFormData = new FormData();
            angular.forEach(files, function(file){
                fileFormData.append('files[]', file._file);
            })
            return fileFormData;
        }
    }]);

