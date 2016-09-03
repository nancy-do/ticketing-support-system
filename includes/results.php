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
            <thead><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>OS</th><th>Issue</th><th>Comment</th><th>Status</th><th>Replies/comments</th><th>Update</th></tr></thead><tbody>';

            $pdo = TicketPDO::getInstance();
            $ticketIDs = $pdo->getIDs();

            foreach ($ticketIDs as $id)
            {
                $ticket = $pdo->getIdData($id['ticket_id']);

                $string .= "<tr>";
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
                $string .= "</tr>";

                //print "<td><button class='btn btn-danger edit'>Edit</button>";
            }

            $string .= "</tbody></table>";
            echo $string;
        }
        else
        {
            echo "<div class='container w'><div class='row centered'><div class='col-lg-12'><h3>COULD NOT LOGIN</h3><p><strong>WARNING - You have entered an incorrect password</strong></p></div></div></div>";
        }

        ?>
    </div><!-- row -->
</div><!-- container -->

<!-- Crappy way to edit ticket - need a better way
<div id="ticketData">
    <button id="return" class="btn btn-danger">Back</button>
    <label>ID:</label>
        <input type="text" name="id">

    <label>First Name:</label>
        <input required type="text" name="firstName">

    <label>Last Name:</label>
        <input required type="text" name="lastName">

    <label>Email:</label>
        <input required type="email" name="email">

    <label>OS:</label>
        <input type="text" name="os">

    <label>Issue:</label>
        <textarea required name="issue" autocapitalize="sentences"></textarea>

    <label>Comment: </label>
        <textarea required name="comments" autocapitalize="sentences"></textarea>

    <label>Status</label>
        <select name="status">
            <option value="PENDING">PENDING</option>
            <option value="UNRESOLVED">UNRESOLVED</option>
            <option value="IN PROGRESS">IN PROGRESS</option>
            <option value="COMPLETED">COMPLETED</option>
        </select>

    <button id="update" class="btn btn-danger">Update</button>
</div>

<script src="js/edit_ticket.js"></script> -->