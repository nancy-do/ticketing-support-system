<?php
include('TicketPDO.php');

if (!isset($_POST))
{
    echo "<p>Invalid data posted!</p>";
    return;
}

$return = "";

foreach ($_POST as $val)
{
    $return .= $val . "\n";
}

echo $return;

// $pdo = TicketPDO::getInstance();
// $ticket = new Ticket()


/*if ($_POST)
{
    $pdo = TicketPDO::getInstance();
    $ticket = new Ticket($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["os"], $_POST["issue"], $_POST["comments"]);
    $pdo->update($ticket);

    echo "Success";
}
else
{
    echo "Invalid data posted";
}*/