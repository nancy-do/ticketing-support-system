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
                $("#reg-col-lg-5").fadeOut(500).hide(function()
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