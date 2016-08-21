<?php

include('TicketPDO.php');

if($_GET)
{
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $os = $_GET['os'];
    $issue = $_GET['issue'];
    $comments = $_GET['comments'];
    $status = $_GET['status'];

    $pdo = TicketPDO::getInstance();

    $ticket = new Ticket($firstName, $lastName, $email, $os, $issue, $comments, $status);
    $pdo->insertData($ticket);

    ?>

    <p>Your support ticket has been successfully created! Please allow up to 24 hours for a response.</p>
    <p>Please click on the <a href="index.php?page=results">link</a> to see all the tickets.</p>

    <?php
} else {
    ?>
    <p>Invalid data posted!</p>
    <?php
}
?>
