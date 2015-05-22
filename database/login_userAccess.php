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
$manageBand = "";
$manageEvents = "";
$manageMessages = "";
$manageUsers = "";



if(isset($_SESSION['msg']) && isset($_SESSION['msgNumber'])){
    $msg = $_SESSION['msg'];
    $msgNumber = $_SESSION['msgNumber'];
}

// checking is no user logged in then display login and sign up links
if (!isset($_SESSION['user_email'])){
    ?>
    <div class='row-right'>
        <span>
            <?php
            //following code displays login errors if user tried and failed to login due to incorrect details entered
            if(isset($_SESSION['msg']) && $msgNumber == 1){
                echo $msg;
                echo "<style> #login { display: block;} #loginLink {display: none;} </style>";
                unset($_SESSION['msgNumber']);
            }?>
        </span>
        <a href="#" id="loginLink" onclick="run();">Log In</a>
        <div id="login"> <?php include("login_form.php"); ?></div>
        <?php echo " | "; ?>
        <a href='signUp.php'>Sign Up</a>
    </div>

<?php
// if user logged in
} else {
    // checking user access level and setting up link names
    // setting up and displaying links to access by user according to access level
    echo "<div class='row-right'>";
    echo "<div class= 'navLoggedIn'";

    //if there is any message then display it here
    if (isset($_SESSION['no_access_msg'])) {
        echo "<span>" . $_SESSION['no_access_msg'] . "</span></br>";
        unset($_SESSION['no_access_msg']);
    }

    echo "<span>" . "Logged in as: " .$_SESSION['user_firstName'] . " !</span>";
    echo " | ";

    if ($_SESSION['user_accessLevel'] == "free"){
        echo "<a href='../message_addPage.php' title='edit Messages'>+Messages</a>";
        echo " | ";

    } else if ($_SESSION['user_accessLevel'] == "paid") {
        echo "<a href='../message_addPage.php' title='edit Messages'>+Messages</a>";
        echo " | ";
        echo "<a href='../bands_addPage.php' title='edit Messages'>+Bands</a>";
    } else if ($_SESSION['user_accessLevel'] == "full"){
        $linkName = "Manage";
        echo "<a href='../message_addPage.php' title='edit Messages'>+Messages</a>";
        echo " | ";
        echo "<a href='../bands_addPage.php' title='edit Messages'>+Bands</a>";
        echo " | ";
        echo "<a href='../events_addPage.php' title='edit Messages'>+Events</a>";
        echo " | ";
        echo "<a href='../users_addPage.php' title='edit Messages'>+Members</a>";

    }

    echo " | ";
    echo "<a href ='". $urlVar."logout.php' title='Log out'> Log Out</a></div>";
    echo "</div class='row-right'>";
    echo "</div class= 'navLoggedIn'";
    unset($_SESSION['no_access_msg']);
}?>