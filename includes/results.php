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

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="imaginary_container">
                            <div class="input-group stylish-input-group">
                                <input type="text" class="form-control"  placeholder="Search" >
                                <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                            </div>
                        </div>
                    </div>
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



