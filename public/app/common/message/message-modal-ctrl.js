/**
 * Created by Piyush Sharma on 8/16/2017.
 */
'use strict';

(function(appCommonModule){
    appCommonModule.controller('messageModalController',['messageService',
        function(messageService){
            var vm = this;

            vm.showSampleMessageModal = showSampleMessageModal;
            vm.sendMessage = sendMessage;
            vm.messageSent = false;
            vm.model = messageService.model;

            //Private Functions
            function showSampleMessageModal(){
                if(!vm.showSampleMessage)
                {
                    throw new Error('showSampleMessage is not registered');
                }
                $('#'+vm.modalId).modal('hide');
                $('#'+vm.modalId).on('hidden.bs.modal', function(e){
                   vm.showSampleMessage();
                });
            }

            function sendMessage(){
                messageService.sendMessage(vm.talentId, vm.managerId)
                    .then(function(){
                        vm.messageSent = true;
                    });
            }
        }
    ]);
})(appCommonModule);