/**
 * Created by WaiTung on 13/08/2016.
 */

const FADETIME = 500;

$(document).ready(function()
{
    $(document).on('submit', '#reg-form', function()
    {
        var data = $(this).serialize();

        $.get("includes/submit.php", data, function(returnData) {
            $("#reg-ticket").fadeOut(FADETIME);
            $("#reg-form").fadeOut(FADETIME);
            $(":animated").promise().done(function() {
                $(returnData).hide().appendTo(".result").fadeIn(FADETIME);
            })
        })

        return false;
    });

    $(document).on('submit', '#viewform', function()
    {
        var data = $(this).serialize();

        $.get("includes/view-ticket.php", data, function(returnData) {
            $("#submit-info").fadeOut(FADETIME);
            $("#view-info").fadeOut(FADETIME);
            $(":animated").promise().done(function() {
                $(returnData).hide().appendTo("#view-results").fadeIn(FADETIME);
            })
        })

        return false;
    });

    $(document).on('submit', '#staff-login-form', function()
    {
        var data = $(this).serialize();

        $.get("includes/results.php", data, function(returnData) {
            $("#staff-login-container").fadeOut(FADETIME);
            $(":animated").promise().done(function() {
                $(returnData).hide().appendTo("#staff-results-container").fadeIn(FADETIME);
            })
        })

        return false;
    });
});