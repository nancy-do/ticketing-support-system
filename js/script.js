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
                $(".result").html(returnData).fadeIn(FADETIME);
            })
        })


        /*$.ajax({

            type : 'GET',
            url  : 'includes/submit.php',
            data : data,
            success :  function(data)
            {
                $("#reg-ticket").fadeOut(500).hide(function()
                {
                    $("#reg-form").fadeOut(500).hide(function()
                    {
                        $(".result").fadeIn(500).show(function()
                        {
                            $(".result").html(data);
                        });
                    });
                });
            }
        });*/
        return false;
    });

    $(document).on('submit', '#viewform', function()
    {
        var data = $(this).serialize();

        $.get("includes/view-ticket.php", data, function(returnData) {
            $("#submit-info").fadeOut(FADETIME);
            $("#view-info").fadeOut(FADETIME);
            $(":animated").promise().done(function() {
                $("#view-results").html(returnData);
            })

        })

        /*$.ajax({
            type : 'GET',
            url  : 'includes/view-ticket.php',
            data : data,
            success :  function(data)
            {
                $("#submit-info").fadeOut(500).hide(function() {
                    $("#view-info").fadeOut(500).hide(function () {
                        $("#view-results").html(data);
                    });
                });
            }
        }); */
        return false;
    });

    $(document).on('submit', '#staff-login-form', function()
    {
        var data = $(this).serialize();

        $.get("includes/results.php", data, function(returnData) {
            $("#staff-login-container").fadeOut(FADETIME);
            $(":animated").promise().done(function() {
                $("#staff-results-container").html(returnData);
            })
        })

        /*$.ajax({
            type : 'GET',
            url  : 'includes/results.php',
            data : data,
            success :  function(data)
            {
                $("#staff-login-container").fadeOut(500).hide(function () {
                    $("#staff-results-container").html(data);
                });
            }
        });*/

        return false;
    });
});