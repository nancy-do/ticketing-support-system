<?php
/**
 * Created by PhpStorm.
 * User: WaiTung Yuen
 * Date: 13/08/2016
 * Time: 17:21
 */
include('TicketPDO.php');
$key = "a2u0i1i6n";
$id = null;

if($_GET)
{
    $id = $_GET['staffKey'];
}

?>

<div class="container w">
    <div class="row centered">
        <div align="center">
            <div class="container">
                <div class="row">

                    <?php

                    //print "id = ".$id." key = ".$key."<br>";
                    if (strcmp($id, $key) == 0)
                    {
                        print "<div class=\"col-sm-6 col-sm-offset-3\"><div id=\"imaginary_container\">";
                        print "<div class=\"input-group stylish-input-group\"><input type=\"text\" id=\"search\" class=\"form-control\"  placeholder=\"Search\" >";
                        print "<span class=\"input-group-addon\"><button type=\"submit\"><span class=\"glyphicon glyphicon-search\"></span>";
                        print "</button></span></div></div></div>";
                        print "<table border='1' id='table'>";
                        print "<thead><tr><td><strong>Id</td><td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>Email</strong></td><td><strong>OS</strong></td><td><strong>Issue</strong></td><td><strong>Comment</strong></td><td><strong>Status</strong></td><td><strong>Replies/comments</strong></td><td><strong>Update</strong></td></tr></thead>";

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
                            print "<td><a href='index.php?page=update_ticket_form.php?id=" . $row['id'] . "'>Add Comments</a></a></td>";
                            print "<td><a href='index.php?page=update_ticket_form.php?id=" . $row['id'] . "'>Update Status</a></a></td></tr>";
                        }
                        print "</table>";

                    }
                    else
                    {
                        print "<h1>Could not login.</h1>";
                    }

                    ?>


                </div>
            </div>
        </div>
    </div><!-- row -->
</div><!-- container -->



