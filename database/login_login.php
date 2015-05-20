<?php

if (!isset($_SESSION)){
    session_start();
}
error_reporting(E_ALL);

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

?>
<!doctype html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Sign Up - </title>
</head>
<body>
<form method="post" action="database/login_process.php" id="Log In">
    <input type="text" name="user_email" id="user_email" placeholder="Email">
    <input type="text" name="user_password" id="user_password" placeholder="Password">
    <input type="submit" name="signIn" id="signIn" value="Log In">
</form>

</body>
</html>