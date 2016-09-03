/**
 * Created by WaiTung on 13/08/2016.
 */

const FADE_TIME = 500;

$(document).ready(function()
{
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
});