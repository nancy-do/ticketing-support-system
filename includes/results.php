<?php
/**
 * Created by PhpStorm.
 * User: WaiTung Yuen
 * Date: 13/08/2016
 * Time: 17:21
 */
include('TicketPDO.php');
$key = "password";
$id = null;

if($_GET)
{
    $id = $_GET['staffKey'];
}

?>

<div class="container w">
    <div class="row">

        <?php

        //print "id = ".$id." key = ".$key."<br>";
        if (strcmp($id, $key) == 0)
        {
            echo '<div class="col-sm-6 col-sm-offset-3">
                    <div class="input-group stylish-input-group">
                        <input type="text" id="search" class="form-control"  placeholder="Search" >
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                    </div>
                  </div>

            <table border="1" id="table">
            <thead><tr><th><strong>Id</th><th><strong>First Name</strong></th><th><strong>Last Name</strong></th><th><strong>Email</strong></th><th><strong>OS</strong></th><th><strong>Issue</strong></th><th><strong>Comment</strong></th><th><strong>Status</strong></th><th><strong>Replies/comments</strong></th><th><strong>Update</strong></th></tr></thead></table>';

            $pdo = TicketPDO::getInstance();
            $ticketIDs = $pdo->getData();

            foreach ($ticketIDs as $id)
            {
                $ticket = $pdo->getIdData($id['ticket_id']);

                echo "<table><tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $ticket->getFirstName() . "</td>";
                echo "<td>" . $ticket->getLastName() . "</td>";
                echo "<td>" . $ticket->getEmail() . "</td>";
                echo "<td>" . $ticket->getOS() . "</td>";
                echo "<td>" . $ticket->getIssue() . "</td>";
                echo "<td>";

                foreach ($ticket->getComments() as $comment)
                {
                    echo $comment . "\n";
                }

                echo "</td>";
                echo "<td>" . $ticket->getStatus() . "</td>";
                echo "</tr></table>";
            }

            /*foreach($results as $row)
            {
                print "<tr><td>".$row['ticket_id']."</td>";
                print "<td>".$row['firstName']."</td>";
                print "<td>".$row['lastName']."</td>";
                print "<td>".$row['email']."</td>";
                print "<td>".$row['os']."</td>";
                print "<td>".$row['issue']."</td>";
                print "<td>";

                // split comment string on \n and spit them into their own paragraph
                foreach (explode("\n", $row['comments']) as $comment)
                {
                    print "<p>" . $comment . "</p>";
                }

                print "</td>";
                print "<td>".$row['status']."</td>";
                print "<td><a href='index.php?page=update_ticket_form.php?id=" . $row['ticket_id'] . "'>Add Comments</a></a></td>";
                print "<td><a href='index.php?page=update_ticket_form.php?id=" . $row['ticket_id'] . "'>Update Status</a></a></td></tr>";
                print "</tbody>";
            }

            print "</table>";*/

        }

        else

        {
            print "<div class=\"container w\"><div class=\"row centered\"><div class=\"col-lg-12\">";
            print "<h3>COULD NOT LOGIN</h3>";
            print "<strong><p>WARNING - You have entered an incorrect password</p></strong>";
            print "</div></div></div>";
        }

        ?>

    </div><!-- row -->
</div><!-- container -->