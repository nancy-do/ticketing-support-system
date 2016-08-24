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

        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container">
                <div class="input-group stylish-input-group">
                    <input type="text" id="search" class="form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                <button type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
                </div>
            </div>
        </div>

        <?php

        if (strcmp($id, $key) == 0)
        {
            print "<table border='1' id='table'>";
            print "<thead><tr><th><strong>Id</th><th><strong>First Name</strong></th><th><strong>Last Name</strong></th><th><strong>Email</strong></th><th><strong>OS</strong></th><th><strong>Issue</strong></th><th><strong>Comment</strong></th><th><strong>Status</strong></th><th>Edit/Update</th></tr></thead>";

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
                print "<td>";

                /* split comment string on \n and spit them into their own paragraph */
                foreach (explode("\n", $row['comments']) as $comment)
                {
                    print "<p>" . $comment . "</p>";
                }

                print "</td>";
                print "<td>".$row['status']."</td>";
                print "<td><button class='btn btn-danger edit'>Edit</button>";
            }

            print "</table>";

        }

        else

        {
            print "<h1>Could not login.</h1>";
        }

        ?>
    </div><!-- row -->
</div><!-- container -->

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

<script src="js/edit_ticket.js"></script>