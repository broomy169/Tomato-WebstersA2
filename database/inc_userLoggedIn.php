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
$msg = "";
$msgNumber = 0;
if(isset($_SESSION['msg']) && isset($_SESSION['msgNumber'])){
    $msg = $_SESSION['msg'];
    $msgNumber = $_SESSION['msgNumber'];
}

if (!isset($_SESSION['user_email'])){
    ?>
    <div class='row-right'>
        <span>
            <?php
            if(isset($_SESSION['msg']) && $msgNumber == 1){
                echo $msg;
                echo "<style> #login { display: block;} #loginLink {display: none;} </style>";
                unset($_SESSION['msgNumber']);
            }?>
        </span>
        <a href="#" id="loginLink" onclick="run();">Log In</a>
        <div id="login"> <?php include("login_login.php"); ?></div>
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
    echo "<span>Welcome - " . $admin . " " .$_SESSION['user_firstName'] . " !!</span>";
    echo " | ";
    echo "<a href ='". $urlVar."usersProcess.php' title= '".$linkName ."'>".$linkName."</a>";
    echo " | ";
    echo "<a href ='". $urlVar."logout.php' title='Log out'> Log Out</a></div>";


}?>