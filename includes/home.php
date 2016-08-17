    <div class="container w">

		<div class="row centered">

            <br><br>

            <div class="col-lg-4">

                <div class="support-ticket" id="reg-ticket">

                    <i class="fa fa-laptop"></i>
                    <h4>SUBMIT SUPPORT TICKET</h4>
                    <p>We will get back to you shortly!</p>
                    <button id="btn" class="btn btn-danger">Submit ticket</button>

                </div><!-- col-lg -->

            </div>
            <div class="col-lg-4">
            </div>

            <div class="col-lg-4">

                <div class="support-ticket" id="view-ticket">

                    <i class="fa fa-laptop"></i>
                    <h4>VIEW YOUR TICKET</h4>
                    <p>Enter ticket ID to view, track and modify ticket.</p>

                    <div class = "contact" id="view-form">
                        <form action = "index.php?page=view-ticket" method = "GET">
                            <label><strong>Ticket ID: </strong></label>
                            <input required type="text" name = "vTicket" id ="tickedID" autocapitalize="words"/>
                            <div style="text-align:center">
                                <button id="btn-view" class="btn btn-danger">View ticket</button>
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

                            <label><strong>Operating System </strong></label>
                            <select required name = "os" id = "os">
                                <option value="Microsoft Windows">Microsoft Windows</option>
                                <option value="Mac OS">Mac OS</option>
                                <option value="Linux">Linux</option>
                            </select>

                            <label><strong>Email: </strong></label><input required type="email" name = "email" id = "email">

                            <label><strong>Issue: </strong></label>
                            <textarea required name = "issue" id = "issue" autocapitalize="sentences"></textarea>

                            <label><strong>Comment: </strong></label>
                            <textarea required name = "comments" id = "comments" autocapitalize="sentences"></textarea>

                            <div style="text-align:center">
                                <button class="btn btn-default" type="submit" id="submit">Submit</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div><!-- col-lg-4 -->

        </div>

    </div>



