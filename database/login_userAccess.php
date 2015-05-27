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




//getting current page's url and sending it to logout page. So after logout it can redirect to same page user
// was on before logout
$url = $_SERVER["REQUEST_URI"];
$_SESSION['url'] = $_SERVER["REQUEST_URI"];

if(isset($_SESSION['msg']) && isset($_SESSION['msgNumber'])){
    $msg = $_SESSION['msg'];
    $msgNumber = $_SESSION['msgNumber'];
}

// if user not logged in then displaying login and sign up links
// clicking on login shows login input fields for login
if (!isset($_SESSION['user_email'])){
    ?>
    <div class='row-right'>
        <?php

        // following if statements only displays messages under menu bar if there is any

        //following code displays invalid input (validation) login messages
        if(isset($_SESSION['msg']) && $msgNumber == 1) {
            echo "<span>";
            echo $msg;
            echo "<style> #login { display: block;} #loginLink {display: none;} </style>";
            unset($_SESSION['msgNumber']);
            unset($_SESSION['msg']);
            echo "</span>";
        }

        //log out message
        if(!empty($_GET['status'])){
            echo "<span>";
            echo "<div>You are successfully logged out.</div>";
            echo "</span>";
        }

        if (!empty($_SESSION['signUpMsg'])){
            echo "<span>";
            echo $_SESSION['signUpMsg'];
            echo "</span>";
            unset($_SESSION['signUpMsg']);
        }?>

        <!-- showing login/login form and signup menu links-->
        <a href='#' id='loginLink' onclick='run();'>Log In</a>
        <div id='login'>
            <form method="post" action="database/login_authenticationProcess.php" id="LogIn">
                <input type="text" name="user_email" id="user_email" placeholder="Email" autofocus>
                <input type="password" name="user_password" id="user_password" placeholder="Password">
                <input type="submit" name="signIn" id="signIn" value="logIn">
            </form>
        </div>
        <a href='signUp.php'>Sign Up</a>
    </div>

<?php
// if user logged in following code will run and display logout as well as navigation bar depending on user's access
// level.
} else {
    
    
    //menu system variable for hihglighting current user menu item if any

    if (empty($_GET)) {
    // no data passed by get
        $_SESSION['currentPage'] = 'None';
    } else {
        $_SESSION['currentPage'] = $_GET['pageName'];
    };
    
    // echo "<h1>".$_SESSION['currentPage'] ."</h1>";
    $editBands = "<a href='bands_addPage.php?pageName=editBands' title='edit Messages'>+Bands </a>";
    $editMessages = "<a href='message_addPage.php?pageName=editMessages' title='Add Messages'>+Messages </a>";
    $editEvents = "<a href='events_addPage.php?pageName=editEvents' title='edit Messages'>+Events </a>";
    $editUsers = "<a href='users_addPage.php?pageName=editUsers' title='edit Messages'>+Members </a>";
    $editGenre = "<a href='genre_addPage.php?pageName=editGenre' title='edit Messages'>+Genre </a>";
    
    if ($_SESSION['currentPage'] == 'editBands'){
        $editBands = "<a class='active' href='bands_addPage.php?pageName=editBands' title='edit Messages'>+Bands </a>";
    } else if ($_SESSION['currentPage'] == 'editMessages'){
        $editMessages = "<a class='active' href='message_addPage.php?pageName=editMessages' title='Add Messages'>+Messages </a>";
    } else if ($_SESSION['currentPage'] == 'editEvents'){
        $editEvents = "<a class='active' href='events_addPage.php?pageName=editEvents' title='edit Messages'>+Events </a>";
    } else if ($_SESSION['currentPage'] == 'editUsers'){
        $editUsers = "<a class='active' href='users_addPage.php?pageName=editUsers' title='edit Messages'>+Members </a>";
    } else if ($_SESSION['currentPage'] == 'editGenre'){
        $editGenre = "<a class='active' href='genre_addPage.php?pageName=editGenre' title='edit Messages'>+Genre </a>";
    }

    echo "<div class='row-right'>";
    echo "<div class= 'navLoggedIn'>";

    //if there is any message then displaying it here (while logged into the system area)
    if (isset($_SESSION['no_access_msg'])) {
        echo "<span>" . $_SESSION['no_access_msg'] . "</span>";
        unset($_SESSION['no_access_msg']);
    }

    if (!empty($_SESSION['Edit'])){
        echo "<span>";
        echo $_SESSION['Edit'];
        echo "</span>";
        unset($_SESSION['Edit']);
    }
    
    if ($_SESSION['user_accessLevel'] == "free"){
        echo $editMessages;

    } else if ($_SESSION['user_accessLevel'] == "paid") {
        echo $editBands;
        echo $editMessages;
        

    } else if ($_SESSION['user_accessLevel'] == "full"){
        echo $editBands;
        echo $editGenre;
        echo $editEvents;
        echo $editMessages;
        echo $editUsers;
    }

    echo "<a href ='".$urlVar."logout.php?url=$url' title='Log out'>(Log out - ".$_SESSION['user_firstName'].")</a>";
    echo "</div>";
    echo "</div>";
}?>