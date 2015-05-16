<?php
session_start();
error_reporting(E_ALL);
//$urlVar = "database/"; //-naughty naughty please set $urlVar in file that calls this one!!!
isset($urlVar) || $urlVar = "";
include($urlVar."database_connect.php");

if (!isset($_SESSION['user_email'])){
    echo"

        <div class='row-right'>
            <!--<a href='database/signup_form.php'>Sign Up - </a>-->
            <a href='signUp.php'>Sign Up - </a>
            <a href='database/login_login.php'>Log In</a>
        </div>
    ";

} else {
    echo " 
        <div class='row-right'>
            <a href='database/logout.php' title=' log out'>' . 'Welcome ' . $_SESSION['user_firstName'] .  - LogOut</a>
        </div>
        ";
}?>