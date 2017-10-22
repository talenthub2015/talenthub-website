/**
 * Created by Piyush Sharma on 4/19/2017.
 */
'use strict';

managerApp.directive('multipleFileUpload', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        require : '^^form',
        controller:function(){ return this},
        controllerAs:'multipleFileVm',
        bindToController: true,
        scope:{
            isFileValidFn: '&?',
            isMultiple: '=?',
            filesModel : '=',
            required : "="
        },
        link: link,
        templateUrl : "/app/manager_app/common/multiple-file-upload/multiple-file-upload-view.html"
    };

    function link(scope, element, attrs, required) {
        var isMultiple = scope.multipleFileVm.isMultiple;
        scope.multipleFileVm.form = required;
        element.bind('change', function () {
            var values = [];
            angular.forEach(element.children('input[type="file"]')[0].files, function (item) {
                var value = {
                    // File Name
                    name: item.name,
                    //File Valid
                    valid : scope.isFileValidFn ? scope.isFileValidFn(item) : true,
                    // File Input Value
                    _file: item
                };
                values.push(value);
            });
            scope.$apply(function () {
                if (isMultiple) {
                    scope.multipleFileVm.filesModel.files = values;
                } else {
                    scope.multipleFileVm.filesModel.files = values[0];
                }
            });
        });
    }
}]);
