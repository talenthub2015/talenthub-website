/**
 * Created by Piyush Sharma on 8/16/2017.
 */
'use strict';

(function(appCommonModule){
    appCommonModule.controller('messageModalController',[function(){
        var vm = this;

        vm.showSampleMessageModal = showSampleMessageModal;

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
    }])
})(appCommonModule);