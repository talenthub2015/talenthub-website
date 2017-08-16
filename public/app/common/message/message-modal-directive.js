/**
 * Created by Piyush Sharma on 8/16/2017.
 */
'use strict';

(function(appCommonModule){

    appCommonModule.directive('messageModal',[function(){
        return {
            restrict : 'A',
            templateUrl : 'app/common/message/message-modal-view.html',
            controller : 'messageModalController',
            controllerAs : 'msgModalVm',
            bindToController : true,
            scope : {
                modalId : '@',
                managerType : '@',
                modalButtonName : '@'
            }
        };
    }]);

})(appCommonModule);