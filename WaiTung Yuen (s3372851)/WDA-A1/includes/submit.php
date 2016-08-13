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

    $pdo = TicketPDO::getInstance();

    $ticket = new Ticket($firstName, $lastName, $email, $os, $issue, $comments);
    $pdo->insertData($ticket);

    ?>

    <p>Ticket Added!</p>
    <p>Please click on the <a href="index.php?page=results">link</a> to see all the tickets.</p>

    <?php
} else {
    ?>
    <p>Invalid data posted!</p>
    <?php
}
?>
