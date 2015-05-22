<?php
session_start();
error_reporting(E_ALL);

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");


$_SESSION = array();
session_destroy();

header("Location: ../index.php");

?>
<h3><a href="login_form.php">Return to Sign Up page</a></h3>
