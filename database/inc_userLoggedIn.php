<?php
if (!isset($_SESSION)){
    session_start();
}
error_reporting(E_ALL);
//$urlVar = "database/"; //-naughty naughty please set $urlVar in file that calls this one!!!
isset($urlVar) || $urlVar = "";
include($urlVar."database_connect.php");

echo "<script src='database/login_showLogin.js' type='text/javascript'></script>";
$linkName = "";
$admin = "";

if (!isset($_SESSION['user_email'])){
    ?>
    <div class='row-right'>
        <a href="#" id="loginLink" onclick="run();">Log In</a>
        <div id="login" style="display: none"> <?php include("login_login.php"); ?></div>
        <?php echo " | "; ?>
        <a href='signUp.php'>Sign Up</a>
    </div>

    <?php } else {
    if ($_SESSION['user_accessLevel'] == "free"){
        $linkName = "Manage Messages";
    } else if ($_SESSION['user_accessLevel'] == "paid") {
        $linkName = "Manage Messages and Bands";
    } else if ($_SESSION['user_accessLevel'] == "full"){
        $linkName = "Manage";
        $admin = "Admin";
    }

    echo "<div class='row-right'>";
    echo "<a>Welcome - " . $admin . " " .$_SESSION['user_firstName'] . " !!</a>";
    echo " | ";
    echo "<a href ='". $urlVar."usersProcess.php' title= '".$linkName ."'>".$linkName."</a>";
    echo " | ";
    echo "<a href ='". $urlVar."logout.php' title='Log out'> Log Out</a></div>";

}?>