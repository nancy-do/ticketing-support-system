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
$updTicket = new Ticket($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["os"], $_POST["issue"], $_POST["status"], $commentsArray, $_POST["id"]);

$id = $_POST["id"];
$oldTicket = $pdo->getIdData($id);

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

$ticket = $pdo->getIdData($id);

if (!isset($ticket))
{
    echo $error;
    return;
}


$string = "<div class='col-lg-12'>";
$string .= "<table border=1>";
$string .= "<thead><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>OS</th><th>Issue</th><th>Comments</th><th>Status</th></tr></thead>";

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
$string .= "</tr></tbody></table><br><br>
            <button id = 'view-ticket-btn' onclick=\"window.location.href='?page=home'\" class='btn btn-danger'>Back</button></div>";

echo $string;

