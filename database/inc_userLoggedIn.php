<?php
session_start();
error_reporting(E_ALL);
//$urlVar = "database/"; //-naughty naughty please set $urlVar in file that calls this one!!!
isset($urlVar) || $urlVar = "";
include($urlVar."database_connect.php");

if (!isset($_SESSION['user_email'])){
    ?>

    <div class='row-right'>
        <a href='signUp.php'>Sign Up - </a>
        <a href='database/login_login.php'>Log In</a>
    </div>

<?php } else {
    echo " <div class='row-right'>";
    echo "<a href='database/logout.php' title=' log out'>" . "Welcome " . $_SESSION['user_firstName'] . " - Log
    Out</a></div>";
}?>