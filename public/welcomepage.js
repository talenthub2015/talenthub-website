/**
 * Created by piyush sharma on 28-04-2015.
 */

$(document).ready(function(){
    $(".usertypetabpanel a").click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
});