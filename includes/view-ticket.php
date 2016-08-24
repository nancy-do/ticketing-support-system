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
    $string .= "<thead><tr><th><strong>Id</th><th><strong>First Name</strong></th><th><strong>Last Name</strong></th><th><strong>Email</strong></th><th><strong>OS</strong></th><th><strong>Issue</strong></th><th><strong>Comment</strong></th></tr></thead>";

    $pdo = TicketPDO::getInstance();
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
        print "<strong><p>WARNING - You have entered an incorrect Ticket ID</p></strong>";
    }
}

print "</div></div></div>";
?>


