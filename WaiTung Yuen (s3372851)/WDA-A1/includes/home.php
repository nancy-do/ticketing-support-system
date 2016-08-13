    <div class="container w">
		<div class="row centered">

            <div class="col-lg-4">

            </div><!-- col-lg-4 -->
            <div class="col-lg-4">
				<i class="fa fa-laptop"></i>
                <h4>PLACE YOUR SUPPORT TICKET HERE</h4>
                <p>We will get back to you shortly!</p>
                <button id="btn" class="btn">View ticket</button>

                <div id="form" class="result" style="display:none;">

                    <hr>

                    <h4>CONTACT FORM</h4>

                    <form name = "myform" action = "index.php?page=submit" method = "GET" id="reg-form">

                        <p><strong>First Name: </strong><input required type="text" name = "firstName" id = "firstName"></p>

                        <p><strong>Last Name: </strong><input required type="text" name = "lastName" id = "lastName"></p>

                        <p><strong>Operating System </strong>
                        <select required name = "os" id = "os">
                            <option value="Microsoft Windows">Microsoft Windows</option>
                            <option value="Mac OS">Mac OS</option>
                            <option value="Linux">Linux</option>
                        </select>
                        </p>

                        <p><strong>Email: </strong><input required type="text" name = "email" id = "email"></p>

                        <p><strong>Issue: <br></strong>
                        <textarea required name = "issue" id = "issue" rows="4" cols="40"></textarea></p>

                        <p><strong>Comment: <br></strong>
                        <textarea required name = "comments" id = "comments" rows="4" cols="40"></textarea></p>

                        <button class="btn" type="submit" id="submit">Submit</button>

                    </form>

                </div>

            </div><!-- col-lg-4 -->
            <div class="col-lg-4">

            </div><!-- col-lg-4 -->
		</div><!-- row -->

	</div><!-- container -->
