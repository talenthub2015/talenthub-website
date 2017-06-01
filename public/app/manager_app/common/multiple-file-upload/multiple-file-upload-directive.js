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
        var model = $parse(scope.files);
        var isMultiple = scope.multiple;
        var modelSetter = model.assign;
        scope.multipleFileVm.form = required;
        element.bind('change', function () {
            var values = [];
            angular.forEach(element[0].files, function (item) {
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
                    modelSetter(scope, values);
                } else {
                    modelSetter(scope, values[0]);
                }
            });
        });
    }
}]);
