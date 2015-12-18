/**
 * Created by piyush sharma on 12-05-2015.
 */
var profileEdit=angular.module("edit-profile",[]);

profileEdit.controller('tabController',function(){
    this.tab=1;

    this.tabClicked=function(a){
        this.tab=a;
    };

    this.isTabClicked=function(a)
    {
        if(this.tab===a)
            return true;

        return false;
    };
});




$(document).ready(function(){
    $("form[name='user_profile']").on('form-error',function(){
        var tab_panel=$(this).find('.tab_panel');
        var tabs=$(".edit-profile .nav-tabs > li > a");

        var error_form_class_name="error_form_validation";

        $(tab_panel).each(function(i,e){
            var errorInTabPanel=$(e).find('.form-control.'+error_form_class_name);
            $(tabs[i]).removeClass(error_form_class_name);
            if(errorInTabPanel.length>0)
            {
                $(tabs[i]).addClass(error_form_class_name);
            }
        });
    });
});