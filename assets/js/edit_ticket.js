$("#ticketData").hide();
$(".edit").click(function() {

    var details = [];

    // loop through all the tds of the tr and add the text to the update form
    $.each($(this).closest("tr").children("td"), function(k, v) {
        details[k] = v.textContent;
    })

    $("table").fadeOut();
    $("#ticketData").fadeIn();

    $("[name=id]").val(details[0]);
    $("[name=firstName]").val(details[1]);
    $("[name=lastName]").val(details[2]);
    $("[name=email]").val(details[3]);
    $("[name=os]").val(details[4]);
    $("[name=issue]").val(details[5]);
    $("[name=comments]").val(details[6]);
    $("[name=status]").val(details[7])

    /* DECIDE: better to re-call data from server = safer
                or do it like this client-side */

});

$("#return").click(function() {
    $(this).parent("div").fadeOut();
    $("table").fadeIn();
});

$("#update").click(function() {
    $.post("includes/updateTicket.php",{
        "id": $("[name=id]").val(),
        "firstName": $("[name=firstName]").val(),
        "lastName": $("[name=lastName]").val(),
        "email": $("[name=email]").val(),
        "os": $("[name=os]").val(),
        "issue": $("[name=issue]").val(),
        "comments": $("[name=comments]").val(),
        "status": $("[name=status]").val()
    }, function(returnData) {
        alert(returnData);
    });
});