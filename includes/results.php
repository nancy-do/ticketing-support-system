<?php
/**
 * Created by PhpStorm.
 * User: WaiTung Yuen
 * Date: 13/08/2016
 * Time: 17:21
 */

include('TicketPDO.php');

?>

<div class="container w">
    <div class="row centered">

        <div align="center">

            <div id="custom-search-input">
                <div class="input-group col-md">
                    <input type="text" class="  search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                            <span class=" glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

        <?php
            print "<table border=1>";
            print "<tr><td><strong>Id</td><td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>Email</strong></td><td><strong>OS</strong></td><td><strong>Issue</strong></td><td><strong>Comments</strong></td><td><strong>Status</strong></td></tr>";
            $pdo = TicketPDO::getInstance();
            $results = $pdo->getData();
            foreach($results as $row)
            {
                print "<tr><td>".$row['id']."</td>";
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

                print "<td>".$row['status']."</td></tr>";
            }
            print "</table>";
            ?>

        </div>

    </div><!-- row -->

</div><!-- container -->



