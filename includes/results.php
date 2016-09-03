<?php
/**
 * Created by PhpStorm.
 * User: WaiTung Yuen
 * Date: 13/08/2016
 * Time: 17:21
 */
include('TicketPDO.php');
//$key = "a2u0i1i6n";
$key = "a"; // temp
$id = null;

if($_GET)
{
    $id = $_GET['staffKey'];
}

?>

<div class="container w">
        <?php

        if (strcmp($id, $key) == 0)
        {
            $string = ' <div class="row"><div class="col-sm-6 col-sm-offset-3">
                            <div class="input-group stylish-input-group">
                                <input type="text" id="search" class="form-control"  placeholder="Search" >
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div><!-- row --></div>
                        <table border="1" id="table">
                            <thead><tr><th>Id</th>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Email</th>
                                       <th>OS</th>
                                       <th>Issue</th>
                                       <th>Comments</th>
                                       <th>Status</th>
                                       <th>Ticket Management</th>
                            </tr></thead>';

            /*<table border="1" id="table">
            <thead><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>OS</th><th>Issue</th><th>Comments</th><th>Status</th><th>Ticket Management</th></tr></thead><tbody>';*/

            $pdo = TicketPDO::getInstance();
            $ticketIDs = $pdo->getIDs();

            foreach ($ticketIDs as $id)
            {
                $ticket = $pdo->getIdData($id['ticket_id']);
                $string .= "<tr><tbody>";
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
                $string .= "<td><button class='btn btn-danger editTicket'>Manage</button></td></tbody></tr>";
            }
            $string .= "</table>";
            //$string .= "</tbody></table>";

            // for staff ticket editing
            $string .= '<div class="editBox">
                            <button class="btn btn-danger back">Back</button>
                            <label>ID:</label><input type="text" id="id" disabled>
                            <label>First Name:</label><input type="text" id="firstname">
                            <label>Last Name:</label><input type="text" id="lastname">
                            <label>Email:</label><input type="text" id="email">
                            <label>OS:</label><input type="text" id="os">
                            <label>Issue:</label><input type="text" id="issue">
                            <label>Comments:</label><textarea id="comments" cols="30" rows="10"></textarea>
                            <label>Status:</label><select id="status">
                                <option value="PENDING">PENDING</option>
                                <option value="UNRESOLVED">UNRESOLVED</option>
                                <option value="INPROGRESS">IN PROGRESS</option>
                                <option value="COMPLETE">COMPLETE</option>
                            </select>
                            <button id="updateTicket" class="btn btn-danger">Update ticket</button>
                        </div>';

            echo $string;
        }
        else
        {
            echo "<div class='container w'><div class='row centered'><div class='col-lg-12'><h3>COULD NOT LOGIN</h3><p><strong>WARNING - You have entered an incorrect password</strong></p></div></div></div>";
        }

        ?>

</div><!-- container -->
