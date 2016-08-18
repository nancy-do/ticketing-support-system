<?php
/**
 * Created by PhpStorm.
 * User: WaiTung Yuen
 * Date: 13/08/2016
 * Time: 17:21
 */

include('TicketPDO.php');

$id = null;

if($_GET)
{
    $id = $_GET['ticketID'];
}
print "<div class=\"container w\"><div class=\"row centered\"><div class=\"col-lg-12\">";

$string = "<table border=1>";
$string .= "<tr><td><strong>Id</td><td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>Email</strong></td><td><strong>OS</strong></td><td><strong>Issue</strong></td><td><strong>Comments</strong></td></tr>";

$pdo = TicketPDO::getInstance();
$results = $pdo->getData();
$found = 0;

foreach($results as $row)
{
    if ($id == $row['id'])
    {
        $string .= "<tr><td>".$row['id']."</td>";
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

if ($found == 1) {
    print $string;
}
else
{
    print "<h1>ID does not exist.</h1>";
}
print "</div></div></div>";
?>


