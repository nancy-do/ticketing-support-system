<?php
include('TicketPDO.php');

if ($_POST)
{
    $pdo = TicketPDO::getInstance();
    $ticket = new Ticket($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["os"],
                            $_POST["issue"], $_POST["comments"]);
    $pdo->update($ticket);

    echo "Success";
}
else
{
    echo "Invalid data posted";
}