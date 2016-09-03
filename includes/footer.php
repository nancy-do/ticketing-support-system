
<!-- FOOTER -->
<div class="clear"></div>
<footer id="f">
    <div class="container">
        <div class="row centered">
            <a href="https://twitter.com/?lang=en"><i class="fa fa-twitter"></i></a><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a><a href="fontawesome.io/icon/dribbble/"><i class="fa fa-dribbble"></i></a>
    
        </div><!-- row -->
    </div><!-- container -->
</footer><!-- Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="assets/js/toggle.js"></script>
    <script src="assets/js/submit.js"></script>
    <script src="assets/js/validateForm.js"></script>
    <script src="assets/js/stickyNavbar.js"></script>
    <script src="assets/js/jsfiddle.js"></script>
    <script>
        // Write on keyup event of keyword input element
        $( document ).ready(function(){
            // Write on keyup event of keyword input element
            $("#search").keyup(function(){
                _this = this;
                // Show only matching TR, hide rest of them
                $.each($("#table tbody").find("tr"), function() {
                    console.log($(this).text());
                    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                        $(this).hide();
                    else
                        $(this).show();
                });
            });
        });
    </script>
</body>
</html>