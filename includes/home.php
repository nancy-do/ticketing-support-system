    <div class="container w">

	<div class="row centered">

            <div class="col-lg-6" id="submit-info">

                <div class="support-ticket" id="reg-ticket">

                    <i class="fa fa-laptop"></i>
                    <h4>SUBMIT SUPPORT TICKET</h4>
                    <p>We will get back to you shortly!</p>
                    <button id="btn" class="btn btn-danger">Submit ticket</button>

                </div><!-- col-lg -->

            </div>
            
            <div id="view-results"></div>

            <div class="col-lg-6" id="view-info">

                <div class="support-ticket" id="view-ticket">

                    <i class="fa fa-laptop"></i>
                    <h4>VIEW YOUR TICKET</h4>
                    <p>Enter ticket ID to view, track and modify ticket.</p>

                    <div class = "contact" id="view-form">
                        <form name = "view-form" action = "index.php?page=view-ticket" method = "GET">

                            <label><strong>Ticket ID: </strong></label>
                            <input required type="text" name = "ticketID" id ="tickedID" autocapitalize="words"/>

                            <div style="text-align:center">
                                <button id="btn-view-form" class="btn btn-danger" type="submit">View ticket</button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

            <div class="col-lg-12">

                <div id="form" class="result" style="display:none;">

                    <div class="contact">
                        <button id="btn-back" class="btn btn-danger">Back</button>
                        <h1>CONTACT FORM</h1>

                        <form name = "myform" action = "index.php?page=submit" method = "GET" id="reg-form">

                            <label><strong>First Name: </strong></label>
                            <input required type="text" name = "firstName" id = "firstName" autocapitalize="words" />

                            <label><strong>Last Name: </strong></label>
                            <input required type="text" name = "lastName" id = "lastName" autocapitalize="words" />

                            <label id = "cfos"><strong>Operating System: </strong></label>
                            <strong><p><div name = "os" id = "os"></div></p></strong>

                            <label><strong>Email: </strong></label><input required type="email" name = "email" id = "email">

                            <label><strong>Issue: </strong></label>
                            <textarea required name = "issue" id = "issue" autocapitalize="sentences"></textarea>

                            <label><strong>Comment: </strong></label>
                            <textarea required name = "comments" id = "comments" autocapitalize="sentences"></textarea>

                            <input type="hidden" name="status" id="status" value="Pending" />

                            <div style="text-align:center">
                                <button class="btn btn-default" type="submit" id="submit">Submit</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div><!-- col-lg-4 -->

        </div>

    </div>



