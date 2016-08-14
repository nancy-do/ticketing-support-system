    <div class="container w">
		<div class="row centered">

            <div class="col-lg-4">

            </div><!-- col-lg-4 -->
            <div class="col-lg-4">
				<i class="fa fa-laptop"></i>
                <h4>PLACE YOUR SUPPORT TICKET HERE</h4>
                <p>We will get back to you shortly!</p>
                <button id="btn" class="btn btn-danger">View ticket</button>

                <div id="form" class="result" style="display:none;">

                    <hr>

                    <div class="contact">

                        <h4>CONTACT FORM</h4>

                        <form name = "myform" action = "index.php?page=submit" method = "GET" id="reg-form">

                            <label><strong>First Name: </strong></label><input required type="text" name = "firstName" id = "firstName" autocapitalize="words" />

                            <label><strong>Last Name: </strong></label><input required type="text" name = "lastName" id = "lastName" autocapitalize="words" />

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
            <div class="col-lg-4">

            </div><!-- col-lg-4 -->
		</div><!-- row -->

	</div><!-- container -->
