/**
 * Created by Piyush Sharma on 8/16/2017.
 */
'use strict';

(function(appCommonModule){
    appCommonModule.service('messageService',['$http',
        function($http){
            var service = {
                modal: {},
                sendMessage : sendMessage
            };

            return service;

            //Private Functions
            function sendMessage(fromId, toId){
                var messageData = getMessageData(fromId, toId);

                $http({
                    method: 'POST',
                    url : 'api/common/message',
                    data : messageData
                })
                    .then(function(){

                    }, function(){
                        throw new Error('Sending Message Failed');
                    })
                    .finally(function(){

                    });
            }

            function getMessageData(){
                return {
                    fromId:'',
                    toId:'',
                    message:''
                };
            }
        }
    ])
})(appCommonModule);