$("#addComments").click(function() {
    console.log("clicked");
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
