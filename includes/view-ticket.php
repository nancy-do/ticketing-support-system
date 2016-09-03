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
$string .= "</tr></tbody></table>";

$string .= "<button class='btn btn-danger' type='submit'>Back</button> | ";
$string .= "<button id='addComments' class='btn btn-danger' type='submit'>Add Comment</button>";
$string .= "<div id='newComments'>";
$string .= "<textarea id='commentsBox'></textarea>";
$string .= "<button id='submitComments' class='btn btn-danger' type='submit'>Submit comments</button></div>";

echo $string;