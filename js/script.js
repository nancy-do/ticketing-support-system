/**
 * Created by WaiTung on 13/08/2016.
 */
$(document).ready(function()
{
    $(document).on('submit', '#reg-form', function()
    {

        var data = $(this).serialize();

        $.ajax({

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
        });
        return false;
    });
});

$(document).ready(function()
{
    $(document).on('submit', '#view-form', function()
    {
        var data = $(this).serialize();

        $.ajax({
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
        });
        return false;
    });
});
