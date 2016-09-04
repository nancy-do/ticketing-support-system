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
                            <div id="search-container" class="input-group stylish-input-group">
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
                $string .= "<tbody><tr>";
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
                $string .= "<td><div class='wrapper'><button class='btn btn-danger editTicket'>Manage</button></td></div></tr></tbody>";
            }
            $string .= "</table>";
            //$string .= "</tbody></table>";

            /* tried to implement back to staff edits page
                            * only successful on first back however after multiple tries it reloads results several times
                            <form id="staff-login-form" action = "index.php?page=results" method = "GET">
                                <input required type="hidden" name ="staffKey" id ="staffKey" value = "'.$key.'"autocapitalize="words"/>
                                <button id= "edit-boc-btn" class="btn btn-danger back">Back</button>
                            </form>
                            */

            // for staff ticket editing
            $string .= '<div class="editBox">';

            //BUTTON OPTIONS (SECOND ONE IS A BIT BUGGY)
            //***************OPT 1
            $string .= '<button id = \'view-ticket-btn\' onclick="window.location.href=\'?page=home\'" class=\'btn btn-danger\'>Back</button>';

            //**************OPT 2
            /*$string .= '<form id="staff-login-form" action = "index.php?page=results" method = "GET">
                                <input required type="hidden" name ="staffKey" id ="staffKey" value = "'.$key.'"autocapitalize="words"/>
                                <button id= "edit-boc-btn" class="btn btn-danger back">Back</button>
                            </form>';
            */

            $string .= '<table border="1" id="table2">
                            <thead><tr><th>Id</th>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Email</th>
                                       <th>OS</th>
                                       <th>Issue</th>
                                       <th>Comments</th>
                            </tr></thead>
                            <tbody><tr>
                            <td id="id" ></td>
                            <td id="firstname"></td>
                            <td id="lastname"></td>
                            <td id="email"></td>
                            <td id="os"></td>
                            <td id="issue"></td>
                            <td id="comments"> </td>
                            </tr>  </tbody></table>
                            <br><br><br>
                            
                            <div class="col-lg-6">
                            <h4>REPLY TO TICKET</h4>
                            <textarea id="commentsBox" cols="30" rows="10"></textarea>
                            </div>
                            
                            <div class="col-lg-6">
                            <h4>UPDATE TICKET</h4>
                                <select id="status">
                                <option value="PENDING">PENDING</option>
                                <option value="UNRESOLVED">UNRESOLVED</option>
                                <option value="INPROGRESS">IN PROGRESS</option>
                                <option value="COMPLETE">COMPLETE</option>
                                </select>
                                
                                <br><br><br><br><br><br>
                                <button id="updateTicket" class="btn btn-danger">Update ticket</button>
                            </div>
                            
                         
                        </div>';

            echo $string;
        }
        else
        {
            echo "<div class='container w'>
                    <div class='row centered'>
                        <div class='col-lg-12'><h3>COULD NOT LOGIN</h3><p><strong>WARNING - You have entered an incorrect password</strong></p>
                        </div></div></div>";
        }

        ?>

</div><!-- container -->
