/**
 * Created by WaiTung on 13/08/2016.
 */
$(document).ready(function()
{
    $(document).on('submit', '#reg-form', function()
    {
        var data = $(this).serialize();

        //$.get(url, datatosend, datareceived)

        $.get("includes/submit.php", data, function(returnData) {
            $("#reg-ticket").fadeOut(500).hide();
            $("#reg-form").fadeOut(500).hide();
            $(".result").fadeIn(500).show(function() {
                $(".result").html(returnData);
            }
        });

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
            $("#submit-info").fadeOut(500).hide();
            $("#view-info").fadeOut(500).hide();
            $("#view-results").html(returnData);
        });

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

        $.get("includes/resulsts.php", data, function(returnData) {
            $("staff-login-container").fadeOut(500).hide();
            $("#staff-results-container").html(data);
        });

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