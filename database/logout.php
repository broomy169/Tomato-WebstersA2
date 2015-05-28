<?php
session_start();

error_reporting(E_ALL);

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

//code to check and redirecting back to same page
$url = $_GET["url"];

$url = $_SESSION["url"];

//setting up header link if using local machine server
$check = "/Tomato-WebstersA2/";
if ($url == $check."bands_addPage.php?pageName=editBands" || $url == $check."genre_addPage.php?pageName=editGenre" || $url == $check."events_addPage.php?pageName=editEvents" || $url == $check."message_addPage.php?pageName=editMessages" || $url == $check."users_addPage.php?pageName=editUsers"){
    $url = $check."index.php";
}

//header setup for ditweb server
if ($url == "/~tcmc03/bands_addPage.php?pageName=editBands" || $url == "/~tcmc03/genre_addPage.php?pageName=editGenre" || $url ==
    "/~tcmc03/events_addPage.php?pageName=editEvents" || $url == "/~tcmc03/message_addPage.php?pageName=editMessages" || $url == "/~tcmc03/users_addPage.php?pageName=editUsers"){
    $url = "/~tcmc03/index.php";
}

echo $url;

// could use session variable for logout message but wanted to try that way as well :)
header("Location: $url?status=loggedOut");

$_SESSION = array();
session_destroy();

?>
