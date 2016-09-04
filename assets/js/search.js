$(document).on( 'keyup', '#search', function()
{
    _this = this;
    // Show only matching TR, hide rest of them
    $.each($("#table tbody").find("tr"), function() {
        //console.log($(this).text());
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
            $(this).hide();
        else
            $(this).show();
    });
    return false;
});