<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 17/08/2016
 * Time: 12:40 PM
 */
include('TicketPDO.php');

?>

<div class="container w">
    <div class="row centered">

        <div align="center" style="margin-bottom: 25px;">

            <?php
            print "<table border=1>";
            print "<tr><td><strong>Id</td><td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>Email</strong></td><td><strong>OS</strong></td><td><strong>Issue</strong></td><td><strong>Comments</strong></td></tr>";
            $pdo = TicketPDO::getInstance();
            $results = $pdo->getData();
            foreach($results as $row)
            {
                print "<tr><td>".$row['ticket_id']."</td>";
                print "<td>".$row['firstName']."</td>";
                print "<td>".$row['lastName']."</td>";
                print "<td>".$row['email']."</td>";
                print "<td>".$row['os']."</td>";
                print "<td>".$row['issue']."</td>";
                print "<td>".$row['comments']."</td></tr>";
            }
            print "</table>";
            ?>

        </div>

    </div><!-- row -->

</div><!-- container -->

