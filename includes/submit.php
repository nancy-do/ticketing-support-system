<?php

include('TicketPDO.php');

if($_GET) {
    $pdo = TicketPDO::getInstance();

    /* valid statuses: unresolved, completed, pending, in progress
        default: pending */
    $ticket = new Ticket($_GET['firstName'], $_GET['lastName'], $_GET['email'], $_GET['os'], $_GET['issue'], $_GET['comments']);
    $pdo->insertData($ticket);

    print "<p>Your support ticket has been successfully created! Please allow up to 24 hours for a response.</p>";
    //print "<p>Please click on the <a href=\"index.php?page=results\">link</a> to see all the tickets.</p>";
    print "<p>Your ticket ID is: " . $ticket->getID() . "</p>";
}
else {
    print"<p>Invalid data posted!</p>";
}
?>
