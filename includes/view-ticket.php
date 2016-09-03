<?php
/**
 * Created by PhpStorm.
 * User: WaiTung Yuen
 * Date: 13/08/2016
 * Time: 17:21
 */

include('TicketPDO.php');

$error = "<h3>ID DOES NOT EXIST</h3><p><strong>WARNING - You have entered an incorrect Ticket ID</strong></p>";

if (!isset($_GET['ticketID']))
{
    echo $error;
    return;
}

$id = $_GET['ticketID'];

$pdo = TicketPDO::getInstance();
$ticket = $pdo->getIdData($id);

if (!isset($ticket))
{
    echo $error;
    return;
}

$string = "<div class='container w'><div class='row centered'><div class='col-lg-12'>";
$string .= "<table border=1>";
$string .= "<thead><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>OS</th><th>Issue</th><th>Comment</th><th>Status</th></tr></thead>";

$string .= "<tbody><tr>";
$string .= "<td>" . $id . "</td>";
$string .= "<td>" . $ticket->getFirstName() . "</td>";
$string .= "<td>" . $ticket->getLastName() . "</td>";
$string .= "<td>" . $ticket->getEmail() . "</td>";
$string .= "<td>" . $ticket->getOS() . "</td>";
$string .= "<td>" . $ticket->getIssue() . "</td>";
$string .= "<td>";

foreach ($ticket->getComments() as $comment)
{
    $string .= $comment . "\n";
}

$string .= "</td>";
$string .= "<td>" . $ticket->getStatus() . "</td>";
$string .= "</tr></tbody></table>";

//Both buttons are here, using bootstraps design classes and ID
$string .= "<button class='btn btn-danger' type='submit'>Back</button> | ";
$string .= "<button id='addComments' class='btn btn-danger' type='submit'>Add Comment</button>";

$string .= '<script>$("#addComments").click(function() {
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
            console.log($(this).closest("table").find("th").eq($(this).index()).text().replace(/\s+/g, ""));
            ticket[$(this).closest("table").find("th").eq($(this).index()).text().replace(/\s+/g, "")] = $(this).text(); 
        })

        ticket["Comment"] .= $("#textarea").text();

        console.log(ticket);

        $.post("includes/updateTicket.php", ticket, function(returnData) {
            $("table").fadeOut(500);
            $(returnData).hide().appendTo("#view-results").fadeIn(500);
        })
    })
});</script>';

echo $string;