// PLACE HOLDERS
SUBMIT_COMMENTS
TEXT_AREA


$(SUBMIT_COMMENTS).click(function() {
    $.post("includes/updateTicket.php", {"comments": $(TEXT_AREA).val()}, function(returnData) {
        $("table").fadeOut(500);
        $(returnData).hide().appendTo("#view-results").fadeIn(500);
    })
});