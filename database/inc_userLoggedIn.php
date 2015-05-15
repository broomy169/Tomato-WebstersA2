<?php
session_start();
error_reporting(E_ALL);
$urlVar = "database/";
isset($urlVar) || $urlVar = "";
include("database_connect.php");

if (!isset($_SESSION['user_email'])){
    ?>

    <div class='row-right'>
        <a href='database/signup_form.php'>Sign Up - </a>
        <a href='database/login_login.php'>Log In</a>
    </div>

<?php } else {
    echo " <div class='row-right'>";
    echo "Welcome " . $_SESSION['user_firstName'] . " - Log Out" . "<a href='database/logout.php' title=' log out'></a></div>";
}?>