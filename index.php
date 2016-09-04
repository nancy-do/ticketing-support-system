<?php

include_once("includes/header.php");
include_once("includes/navbar.php");

$page = '';
if (isset($_GET['page']))
    $page = $_GET['page'];

if ($page == "faqs")
{
	include_once("includes/faqs.php");
}
else if ($page == "staff")
{
    include_once("includes/result-view.php");
}
else if ($page == "view-ticket")
{
    include_once("includes/view-ticket.php");
}
else if ($page == "results")
{
    include_once("includes/results.php");
}
else
{
	include_once("includes/home.php");
}

include("includes/footer.php")

?>