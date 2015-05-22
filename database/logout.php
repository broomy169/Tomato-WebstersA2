<?php
session_start();

error_reporting(E_ALL);

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$_SESSION = array();
session_destroy();

header("Location: ../index.php?status=loggedOut");
?>
