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

        if (strcmp($id, $key) == 0)
        {
            $string = '<div class="col-sm-6 col-sm-offset-3">
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
            <thead><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>OS</th><th>Issue</th><th>Comment</th><th>Status</th><th>Replies/comments</th><th>Update</th></tr></thead></table>';

            $pdo = TicketPDO::getInstance();
            $ticketIDs = $pdo->getIDs();

            foreach ($ticketIDs as $id)
            {
                $ticket = $pdo->getIdData($id['ticket_id']);

                $string .= "<table><tr>";
                $string .= "<td>" . $id['ticket_id'] . "</td>";
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
                $string .= "</tr></table>";
            }

            echo $string;
        }
        else
        {
            echo "<div class='container w'><div class='row centered'><div class='col-lg-12'><h3>COULD NOT LOGIN</h3><p><strong>WARNING - You have entered an incorrect password</strong></p></div></div></div>";
        }

        ?>

    </div><!-- row -->
</div><!-- container -->