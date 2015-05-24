/**
 * Created by piyush sharma on 12-05-2015.
 */
$(document).ready(function(){

    /*Defining Some Common calls to some functions which may be used to configure widgets like datepicker, etc. */

    //$("").datepicker();
    jQuery('form').on('focus',"input.datepicker", function(){
        jQuery(this).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });




    /*
    Defining functionality for Collapse and Expansion of content
    Structure .collapse-content > h1, .collapse-content > .collapsed-content
     */
    var collapseDivContainer = $(".collapse-content");
    var headers = $(".collapse-content .trigger");
    var slideSpeed = 200;
    var collapsedContent=".collapsed-content";

    $(headers).each(function(){
        $(this).next(collapsedContent).slideUp(0);
    });

    $("div").on('click','.collapse-content .trigger',function(event){
        event.stopPropagation();
        $(this).next(collapsedContent).slideToggle(slideSpeed);
    });



    /*
    Defining functionality for duplicating content of a div
    Duplicate container div is with class "duplicate_content_container" and content need to be duplicated is in class "duplicate_this_content"
    Button triggering this event is with class "duplicate_content_button".
    Button to Delete a duplicated content will have class "delete_duplicate_content_button".
     */

    $(".duplicate_content_container").on('click',".duplicate_content_button",function(){
        if(confirm('Are you sure you want to add more?'))
        {
            var duplicateContentContainer=$(this);
            var duplicateElement;
            while(true)
            {
                duplicateContentContainer=$(duplicateContentContainer).parent();
                if($(duplicateContentContainer).hasClass('duplicate_content_container'))
                {
                    break;
                }
            }
            //duplicateElement=$(duplicateContentContainer).find(".duplicate_this_content");
            //var temp = "<div class='content_duplicated'>"+$(duplicateElement).html()+"<div class='close_duplicate delete_duplicate_content_button'>X</div></div>";
            //$(duplicateContentContainer).find(".place_duplicate_content_here").append(temp);
            //$(duplicateContentContainer)
            //    .find(".place_duplicate_content_here input,.place_duplicate_content_here select,.place_duplicate_content_here textarea")
            //    .val('');

            var targetContent = $(this).data('targetDuplicateContent');
            var placeDuplicateContentTarget = $(this).data('placeDuplicateContent');
            var temp;
            if($(this).data('duplicateContentType')!="table")
            {
                temp="<div class='content_duplicated'>"+$(duplicateContentContainer).find(targetContent).html()+"<div class='close_duplicate delete_duplicate_content_button'>X</div></div>";
            }
            else if($(this).data('duplicateContentType')=="table")
            {
                temp="<tr class='content_duplicated'>"+$(duplicateContentContainer).find(targetContent).html()+"</tr>";
            }

            $(duplicateContentContainer).find(placeDuplicateContentTarget).append(temp);
            if($(this).data('duplicateContentType')=="table")
            {
                $(duplicateContentContainer).find(placeDuplicateContentTarget).find('.content_duplicated:last-child')
                    .find('td:last-child').append("<div class='close_duplicate table_close delete_duplicate_content_button' title='Remove'>X</div>");
            }
            $(duplicateContentContainer).find(placeDuplicateContentTarget).find('.content_duplicated:last-child').find('input,select,textarea').val('');

            //Firing a trigger to let other objects know about the event
            //alert("Classes : " + $(duplicateContentContainer).attr('class') + " ID: " + $(duplicateContentContainer).attr('id'));
            $(placeDuplicateContentTarget).trigger("content-duplicated");
        }
        return false;
    });

    $(".duplicate_content_container .place_duplicate_content_here").on('click',".content_duplicated .delete_duplicate_content_button",function(){
        if(confirm('Are you sure to remove it?'))
        {
            var duplicatedContent=$(this);
            var duplicateElement;
            while(true)
            {
                duplicatedContent=$(duplicatedContent).parent();
                if($(duplicatedContent).hasClass('content_duplicated'))
                {
                    break;
                }
            }
            $(duplicatedContent).remove();
        }
        return false;
    });











});
