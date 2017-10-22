/**
 * Created by Piyush Sharma on 8/16/2017.
 */
'use strict';

(function(appCommonModule){
    appCommonModule.service('messageService',['$http',
        function($http){
            var service = {
                model: {},
                loading: false,
                sendMessage : sendMessage
            };

            return service;

            //Private Functions
            function sendMessage(fromId, toId){
                var messageData = getMessageData(fromId, toId);
                service.loading = true;

                return $http({
                    method: 'POST',
                    url : 'api/common/message',
                    data : messageData
                    })
                        .then(function(response){
                            if(response.data.status_code === 200)
                            {
                                return true;
                            }
                            return false;
                        }, function(){
                            throw new Error('Sending Message Failed');
                        })
                        .finally(function(){
                            service.loading = false;
                        });
            }

            function getMessageData(fromId, toId){
                return {
                    fromId: fromId,
                    toId: toId,
                    message: service.model.message
                };
            }
        }
    ])
})(appCommonModule);