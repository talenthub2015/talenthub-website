$(document).ready(function(){

    /////////////////////////////////////////////////////////////////////////
    //----------- For contacting a Manager by a talent --------------------//
    /////////////////////////////////////////////////////////////////////////

    var manager_id = null;
    var talent_id = null;

    $(".contact_manager_link").click(function(event){
        event.preventDefault();

        if($(this).data("managerContactedStatus") == "1")
        {
            return false;
        }

        manager_id = $(this).data('managerId');
        talent_id = $(this).data('talentId');
        $($(this).data('target')).modal('show');
        $("#contactManagerModal .confirm_message").show();
        $("#contactManagerModal .show_loading_image").addClass("hide");
        $("#contactManagerModal .modal-footer button").show();
    });


    $("#contact_manager").click(function(){

        if(whitespace.test($("#contactManagerModal #message").val()))
        {
            $("#contactManagerModal #message").addClass(errorClassName);
            $("#contactManagerModal #message").tooltip();
            return false;
        }

        $("#contactManagerModal .confirm_message").hide();
        $("#contactManagerModal .show_loading_image").removeClass("hide");
        $("#contactManagerModal .modal-footer button").hide();

        $.ajax({
            url:'/database/contactManager',
            data:{
                talent_id   :   talent_id,
                manager_id  :   manager_id,
                message     :   $("#contactManagerModal #message").val()
            },
            dataType: "json",
            method: "POST"
        })
            .done(function(data){
                if(data.status == "successful")
                {
                    $("a[data-manager-id='"+manager_id+"']").text("Contacted").removeClass("btn-primary").addClass("btn-success");
                    $("a[data-manager-id='"+manager_id+"']").data("managerContactedStatus","1");
                    $("#contactManagerModal").modal('hide');
                }
                else if(data.status == "error")
                {
                    $errorPara  = $("#contactManagerModal .alert.alert-danger");
                    $errorPara.removeClass("hide");
                    if(data.error_type == "ID_MISSING")
                    {
                        $errorPara.text("Either of the ID is missing from the request");
                    }
                    else if(data.error_type == "TALENT_ID_INVALID")
                    {
                        $errorPara.text("Invalid user ID sent with the request");
                    }
                    else if(data.error_type == "DATABASE_ERROR")
                    {
                        $errorPara.text("Some error occurred while processing your request. Please try again!");
                    }
                    $("#contactManagerModal .show_loading_image").addClass("hide");
                }
            })
            .fail(function(jqXHR, textStatus){
                alert( "Request failed: " + textStatus );
            });
    });


    /////////////////////////////////////////////////////////////////////////
    //----------- For contacting a Manager by a talent --------------------//
    /////////////////////////////////////////////////////////////////////////


});