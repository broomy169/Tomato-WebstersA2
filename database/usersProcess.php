<?php
session_start();
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$debugOn = true;

if (isset($_SESSION['user_accessLevel']) == "full") {
    include("inc_pageSetup.php");




} else if (isset($_SESSION['user_accessLevel']) == "free") {

} else if (isset($_SESSION['user_accessLevel']) == "paid") {

}