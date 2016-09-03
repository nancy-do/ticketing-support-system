/**
 * Created by WaiTung on 13/08/2016.
 */

const FADE_TIME = 500;

$(document).on('submit', '#reg-form', function()
{
    var data = $(this).serialize();

    $.get("includes/submit.php", data, function(returnData) {
        $("#reg-ticket").fadeOut(FADE_TIME);
        $("#reg-form").fadeOut(FADE_TIME);
        $(":animated").promise().done(function() {
            $(returnData).hide().appendTo(".result").fadeIn(FADE_TIME);
        })
    })

    return false;
});

$(document).on('submit', '#viewform', function()
{
    var data = $(this).serialize();

    $.get("includes/view-ticket.php", data, function(returnData) {
        $("#submit-info").fadeOut(FADE_TIME);
        $("#view-info").fadeOut(FADE_TIME);
        $(":animated").promise().done(function() {
            $(returnData).hide().appendTo("#view-results").fadeIn(FADE_TIME);
        })
    })

    return false;
});

$(document).on('click', '#back-ticket', function()
{
    $(":animated").promise().done(function() {
        $("#submit-info").fadeIn(FADE_TIME);
        $("#view-info").fadeIn(FADE_TIME);
        $("#view-results").fadeOut(FADE_TIME);
    })
});

$(document).on('submit', '#staff-login-form', function()
{
    var data = $(this).serialize();

    $.get("includes/results.php", data, function(returnData) {
        $("#staff-login-container").fadeOut(FADE_TIME);
        $(":animated").promise().done(function() {
            $(returnData).hide().appendTo("#staff-results-container").fadeIn(FADE_TIME);
        })
    })

    return false;
});



$(document).on( "click", '#addComments', function()
{
    //console.log("clicked");
    var textarea = document.createElement("textarea");
    var submitComments = document.createElement("button");

    $(textarea).prop("id", "textarea");
    $(textarea).appendTo("#view-results");
    $(submitComments).prop("id", "submitComments");
    $(submitComments).appendTo("#view-results");

    $("#submitComments").click(function() {

        var ticket = {};

        $("td").each(function () {
            console.log($(this).closest("table th").eq($(this).index()).html());
            ticket[$(this).closest("table th").eq($(this).index()).html()] = $(this).val();
        })

        //ticket["comments"] .= $("#textarea").val();

        console.log(ticket);

        $.post("includes/updateTicket.php", ticket, function(returnData) {
            $("table").fadeOut(500);
            $(returnData).hide().appendTo("#view-results").fadeIn(500);
        })
    })
});

