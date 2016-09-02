<?php

include('TicketPDO.php');

if($_GET) {
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $os = $_GET['os'];
    $issue = $_GET['issue'];
    $comments = $_GET['comments'];
    $status = $_GET['status'];

    $pdo = TicketPDO::getInstance();

    /* valid statuses: unresolved, completed, pending, in progress
        default: pending */
    $ticket = new Ticket($firstName, $lastName, $email, $os, $issue, "PENDING", array($comments));
    $pdo->insertData($ticket);

    print "<p>Your support ticket has been successfully created! Please allow up to 24 hours for a response.</p>";
    //print "<p>Please click on the <a href=\"index.php?page=results\">link</a> to see all the tickets.</p>";
    print "<p>Your ticket ID is: " . $ticket->getID() . "</p>";
}
else {
    print"<p>Invalid data posted!</p>";
}
?>
