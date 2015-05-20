<?php
session_start();
error_reporting(E_ALL);
//$urlVar = "database/"; //-naughty naughty please set $urlVar in file that calls this one!!!
isset($urlVar) || $urlVar = "";
include($urlVar."database_connect.php");

$linkName = "";
$admin = "";

if (!isset($_SESSION['user_email'])){
    ?>
    <div class='row-right'>
        <a href= 'database/login_login.php'>Log In</a>
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
    echo "<a href ='". $urlVar."usersProcess.php' title= 'Manage ".$linkName ."'>".$linkName."</a>";
    echo " | ";
    echo "<a href ='". $urlVar."logout.php' title='Log out'> Log Out</a></div>";

    echo $linkName;
    echo $_SESSION['user_accessLevel'];
}?>