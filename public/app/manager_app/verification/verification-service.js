/**
 * Created by Piyush Sharma on 01/04/2017.
 */
'use strict';
managerApp.service('verificationService', ['managerProfileService', '$http', '$q', '_',
    function (managerProfileService, $http, $q, _){

        var service;

        service = {
            model :{},
            loading : false,
            getManagerType : getManagerType,
            getVerificationRequest : getVerificationRequest,
            submitVerificationRequest : submitVerificationRequest
        }

        return service;

        function getManagerType(){
            service.loading = true;
            return managerProfileService.getProfile().
                then(function(){
                    service.loading = false;
                    return managerProfileService.profileModel.user_type;
            });
        }

        function getVerificationRequest(managerProfileId){
            service.loading = true;
            return $http({
                url: 'api/manager/verification-request',
                method: "GET",
                params : {
                    'managerProfileId' : managerProfileId
                }
            })
                .then(function(response){
                    mapVerificationRequestModel(response.data);
                    service.loading = false;
                },function(){
                    service.loading = false;
                });
        }

        function submitVerificationRequest(){
            service.loading = true;
            return $http({
                url: 'api/manager/verification-request',
                method: "PUT",
                data: service.model
            })
                .then(function(response) {
                    updateRequestModel(response.data);
                    return submitVerificationRequestFiles()
                        .then(function(){
                            service.loading = false;
                            return $q.when(response.data)
                        },function(){
                            service.loading = false;
                        });
                });
        }

        function submitVerificationRequestFiles(){
            var fileFormData = createFileFormData(service.model.files);
            fileFormData.append('verificationId', service.model.id);

            return $http({
                url: 'api/manager/verification-request-files-upload',
                method: "POST",
                data: fileFormData,
                headers: {'Content-Type': undefined},
                transformRequest    : angular.identity
            });
        }

        //Private Methods
        function createFileFormData(files){
            var fileFormData = new FormData();
            angular.forEach(files, function(file){
                fileFormData.append('files[]', file._file);
            })
            return fileFormData;
        }

        function mapVerificationRequestModel(verificationRequest){
            service.model = _.merge(service.model, verificationRequest);
        }

        function updateRequestModel(verificationData)
        {
            service.model.id = verificationData.id;
            service.model.verificationStatus = verificationData.verificationStatus;
        }
    }]);

