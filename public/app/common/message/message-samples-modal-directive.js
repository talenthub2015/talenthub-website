/**
 * Created by Piyush Sharma on 8/16/2017.
 */
'use strict';

(function(appCommonModule){

    appCommonModule.directive('messageSamplesModal',[function(){
        return {
            restrict : 'A',
            templateUrl : 'app/common/message/message-sample-modal-view.html',
            controller : 'messageSamplesModalController',
            controllerAs : 'msgSampleModalVm',
            bindToController : true,
            scope : {
                modalId : '@'
            }
        };
    }]);

})(appCommonModule);