<?php

include('TicketPDO.php');

if (!isset($_GET)))
{
    echo "<p>Invalid data posted!</p>";
    return;
}

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

echo "<p>Your support ticket has been successfully created! Please allow up to 24 hours for a response.</p><p>Your ticket ID is: " . $ticket->getID() . "</p>";