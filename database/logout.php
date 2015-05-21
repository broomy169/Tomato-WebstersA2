<?php
session_start();
error_reporting(E_ALL);

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");


$_SESSION = array();
session_destroy();

header("Location: index.php");

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Log out - TCMC </title>
    <style>
        a {background-color: #b5ffb0; text-decoration: none; border: double #000000; padding: 4px;}
        a:hover {background-color: #0eff39; border: solid #000000; }
    </style>
<body>
<h3><a href="login_form.php">Return to Sign Up page</a></h3>

</body>
</html>