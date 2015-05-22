<?php
if (!isset($_SESSION)){
    session_start();
}

error_reporting(E_ALL);

isset($urlVar) || $urlVar = "";
include($urlVar."database_connect.php");

echo "<script src='database/login_showLogin.js' type='text/javascript'></script>\n";

$msg = "";
$msgNumber = 0;

if(isset($_SESSION['msg']) && isset($_SESSION['msgNumber'])){
    $msg = $_SESSION['msg'];
    $msgNumber = $_SESSION['msgNumber'];
}



// checking is no user logged in then display login and sign up links
// clicking on login shows login inputs as user fields
if (!isset($_SESSION['user_email'])){
    ?>
    <div class='row-right'>
        <?php

        //following code displays invalid login messages
        if(isset($_SESSION['msg']) && $msgNumber == 1) {
            echo "<span>";
            echo $msg;
            echo "<style> #login { display: block;} #loginLink {display: none;} </style>";
            unset($_SESSION['msgNumber']);
            echo "</span>";
        }

        //log out message
        if(!empty($_GET['status'])){
            echo "<span>";
            echo "<div>You are successfully logged out.</div>";
            echo "</span>";
        }?>
        <a href='#' id='loginLink' onclick='run();'>Log In</a>
        <div id='login'>
            <?php include("login_form.php"); ?>
        </div>
        <a href='signUp.php'>Sign Up</a>
    </div>

<?php
// if user logged in
} else {
    $editBands = "<a href='bands_addPage.php' title='edit Messages'>+Bands </a>";
    $editMessages = "<a href='message_addPage.php' title='Add Messages'>+Messages </a>";
    $editEvents = "<a href='events_addPage.php' title='edit Messages'>+Events </a>";
    $editUsers = "<a href='users_addPage.php' title='edit Messages'>+Members </a>";

    echo "<div class='row-right'>";
    echo "<div class= 'navLoggedIn'>";

    //if there is any message then displaying it here
    if (isset($_SESSION['no_access_msg'])) {
        echo "<span>" . $_SESSION['no_access_msg'] . "</span></br>";
        unset($_SESSION['no_access_msg']);
    }

    if ($_SESSION['user_accessLevel'] == "free"){
        echo $editMessages;

    } else if ($_SESSION['user_accessLevel'] == "paid") {
        echo $editMessages;
        echo $editBands;

    } else if ($_SESSION['user_accessLevel'] == "full"){
        echo $editMessages;
        echo $editBands;
        echo $editEvents;
        echo $editUsers;
    }

    echo "<a href ='".$urlVar."logout.php' title='Log out'>(Log out - " .$_SESSION['user_firstName'] . ")</a>";
    echo "</div>";
    echo "</div>";

    // un-setting is there is any messages as we only need to display them once
    if (isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    }
}?>