<?php
/**
 * Created by PhpStorm.
 * User: WaiTung Yuen
 * Date: 13/08/2016
 * Time: 17:21
 */

include('TicketPDO.php');

if($_GET)
{
    $id = $_GET['ticketID'];

    print "<div class=\"container w\"><div class=\"row centered\"><div class=\"col-lg-12\">";

    $string = "<table border=1>";
    $string .= "<thead><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>OS</th><th>Issue</th><th>Comment</th><th>Status</th></tr></thead>";

    $pdo = TicketPDO::getInstance();
    $ticket = $pdo->getIdData($id);

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

    echo $string;
}

    /*$pdo = TicketPDO::getInstance();
    //$results = $pdo->getIdData($id);
    $results = $pdo->getData();
    $found = 0;
    foreach($results as $row)
    {
        if ($id == $row['ticket_id'])
        {
            $string .= "<tr><td>".$row['ticket_id']."</td>";
            $string .= "<td>".$row['firstName']."</td>";
            $string .= "<td>".$row['lastName']."</td>";
            $string .= "<td>".$row['email']."</td>";
            $string .= "<td>".$row['os']."</td>";
            $string .= "<td>".$row['issue']."</td>";
            $string .= "<td>".$row['comments']."</td></tr></table>";
            $found++;
            break;
        }
    }
    if ($found == 1)
    {
        print $string;
    }
    else
    {
        print "<h3>ID DOES NOT EXIST</h3>";
        print "<p>WARNING - You have entered an incorrect Ticket ID</p>";
    }
}*/

print "</div></div></div>";
?>


