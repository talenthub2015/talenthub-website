$(document).ready(function(){

    /////////////////////////////////////////////////////////////////////////
    //------ For Updating server that user viewed the notification --------//
    /////////////////////////////////////////////////////////////////////////

    $(".to_notification_link").click(function(event){
        //event.preventDefault();

        if(($(this).children('notification.read')).length>0)
        {
            return true;
        }

        var notification_id = $(this).data('notificationId');
        userViewedNotification(this,notification_id);
    });


    var userViewedNotification = function(linkElement,notification_id){
        $.ajax({
            url:'/profile/notificationRead',
            data:{
                notification_id   :   notification_id
            },
            dataType: "json",
            method: "POST"
        })
            .done(function(data){
                if(data.status == "successful")
                {
                    console.log('Successful');
                }
                else if(data.status == "error")
                {
                    console.log('Error in processing request ' + data.error_type);
                }
            })
            .fail(function(jqXHR, textStatus){
                console.log('Error in sending the request ' + textStatus);
            });
    };

    /////////////////////////////////////////////////////////////////////////
    //------ For Updating server that user viewed the notification --------//
    /////////////////////////////////////////////////////////////////////////


});