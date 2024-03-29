<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title>ITS Web Ticketing System</title>
    <link href="assets/css/staff_style.css" rel="stylesheet">
    <!-- Referenced for education purposes: http://www.freewebdesigntutorials.net/100-best-free-html-css-search-boxes/ -->
    <link href="assets/css/search_bar.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
</head>

<body>
<ul class="topnav" id="myTopnav">
    <li class="sliding-middle-out"><a href="index.php?page=faqs">FAQs</a></li>
    <li class="sliding-middle-out"><a href="index.php?page=home">Home</a></li>
    <li class="icon">
        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
    </li>
</ul>

<!-- Meant to be roundered corners, trying to make it edged -->
<div id="berryBackground">
    <!-- Please adjust the code for button to link it back when ready -->
    <div class="box">
        <h1 class="center">STAFF</h1>
    </div>
</div>

<!-- Search bar -->
<div class='search'>
    <div class='search_bar'>
        <input id='searchOne' type='checkbox'>
        <label for='searchOne'>
            <i class='icon ion-android-search'></i>
            <i class='last icon ion-android-close'></i>
            <p>|</p>
        </label>
        <input placeholder='Search an ID or an Email' type='text'>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        /* For the Top Navigation bar */
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
<footer>
    <p> ITS <img src="assets/img/circle.png"> RMIT </p>
    <p class="sub">trusted by students campus-wide.</p>
</footer>
</html>




