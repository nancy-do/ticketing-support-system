/**
 * Created by WaiTung on 13/08/2016.
 */

const FADE_TIME = 500;
const TICKET_VARS = ["id", "firstname", "lastname", "email", "os", "issue", "status", "comments"];

function postToServer(script, data, appendResult) {
    $.post(script, data, function(returnData) {
        $("animated").promise().done(function() {
            $(returnData).appendTo(appendResult).fadeIn(FADE_TIME);
        });
    });
}

function constructTicketArray() {
    var array = {};

    $.each(TICKET_VARS, function(key) {
        array[key] = 0;
    });

    return array;
}

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



/*
 $('#view-ticket-btn').click(function(){
 window.location.href='?page=home';
 });

$(document).onclick('click', "#view-ticket-btn", function() {
    window.location.href='?page=home';

});
 */

$(document).on('click', "#addComments", function() {

    $("#newComments").fadeIn(FADE_TIME);
    $("#comment-back-opt").fadeOut(FADE_TIME);

    $("#submitComments").click(function() {

        $("table").fadeOut(FADE_TIME);
        $("#addComments").fadeOut(FADE_TIME);
        $(this).closest("div").fadeOut(FADE_TIME);
        $(this).fadeOut(FADE_TIME);

        var ticket = constructTicketArray();

        // create key value pairs by using the text of the th (strip spaces from word) for the key the text of the td for value
        $("td").each(function () {
            ticket[$(this).closest("table").find("th").eq($(this).index()).text().replace(/\s+/g, "").toLowerCase()] = $(this).text(); 
        })

        ticket["comments"] += $("#commentsBox").val();

        postToServer("includes/updateTicket.php", ticket, "#view-results");

        // $.post("includes/updateTicket.php", ticket, function(returnData) {
        //     $(":animated").promise().done(function() {
        //         $(returnData).hide().appendTo("#view-results").fadeIn(FADE_TIME);
        //     })
        // })
    })
});

$(document).on("click", "#edit-boc-btn", function() {
    $(".editBox").fadeOut(FADE_TIME);
});


$(document).on("click", ".editTicket", function() {
    $("#table").fadeOut(FADE_TIME);
    $("#search-container").fadeOut(FADE_TIME);
    var data = constructTicketArray();

    // fill array with ids and values
    $.each($(this).closest("tr").children("td"), function() {
        data[$(this).closest("table").find("th").eq($(this).index()).text().replace(/\s+/g, "").toLowerCase()] = $(this).text();
    })

    // now populate the inputs
    $.each(data, function(id, value) {

        if (id == "status")
        {
            $("#" + id).val(value);
        }
        else
        {
            $( "#" + id ).text(value);
        }
    })

    $(":animated").promise().done(function() {
        $(".editBox").slideToggle(FADE_TIME);
    })

    var ticket = constructTicketArray();

    $("#updateTicket").click(function() {
        $(".editBox").slideToggle(FADE_TIME);

        $("td").each(function () {
            ticket[$(this).closest("table").find("th").eq($(this).index()).text().replace(/\s+/g, "").toLowerCase()] = $(this).text();
        })


        ticket["comments"] += "<br /><br />";
        ticket["comments"] += "******* STAFF SOLUTION *******";
        ticket["comments"] += "<br /><br />";
        ticket["comments"] += $("#commentsBox").val();
        ticket["status"] = $("#status").val();

        // append to row for now - PLEASE CHANGE (i did this at 5am)
        postToServer("includes/updateTicket.php", ticket, "#results-staff-edits");
    })
});
