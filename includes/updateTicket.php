<?php
include('TicketPDO.php');

if (!isset($_POST))
{
    echo "<p>Invalid data posted!</p>";
    return;
}

$pdo = TicketPDO::getInstance();
$commentsArray = explode("\n", $_POST["comments"]);

// post var keys must be lower case unless someone can change js to adjust them to camelcase
$updTicket = new Ticket("lol", $_POST["lastname"], $_POST["email"], $_POST["os"], $_POST["issue"], $_POST["status"], $commentsArray, $_POST["id"]);
$oldTicket = $pdo->getIdData($_POST["id"]);

$updArr = $updTicket->getVars();
$oldArr = $oldTicket->getVars();

$whatsNew = array_diff_assoc($updArr, $oldArr);

// Check whats changed and this way limit the database calls for security etc ID SHOULD NEVER CHANGE ON TICKET UPDATE
if (array_key_exists("status", $whatsNew) || array_key_exists("issue", $whatsNew))
{
    $pdo->updateTicket($updTicket);
}

if (array_key_exists("firstName", $whatsNew) || array_key_exists("lastName", $whatsNew) || array_key_exists("email", $whatsNew) || array_key_exists("os", $whatsNew))
{
    $pdo->updateUser($updTicket);
}

if (array_key_exists("comments", $whatsNew))
{
    $pdo->updateComments($updTicket);
}

echo "<p><strong>Success! Added to database.</strong></p>";
