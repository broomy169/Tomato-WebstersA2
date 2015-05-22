<?php
session_start();

error_reporting(E_ALL);

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

//code to check and redirecting back to same page
$url = $_GET['url'];
$check = "/Tomato-Webstersa2/";
echo $url;
if ($url == $check."bands_addPage.php" || $url == $check."events_addPage.php" || $url == $check."message_addPage.php"
            || $url == $check."users_addPage.php"){
    $url = "../index.php";
}

// could use session variable for logout message but wanted to try that way as well :)
header("Location: $url?status=loggedOut");

$_SESSION = array();
session_destroy();

?>
