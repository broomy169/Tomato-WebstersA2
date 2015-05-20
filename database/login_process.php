<?php
session_start();
error_reporting(E_ALL);

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$debugOn = true;

$row = null;
$rowArray = null;
$username = $_POST['user_email'];
//$password = md5($_POST['user_password']); will be using encryption later on
$password = $_POST['user_password'];

//getting info out of database based on email addeess logged in
$sql = "SELECT * FROM Users WHERE user_email = '$username'";
$result = $dbh->query($sql);
foreach ($result as $rowArray){
    $row = $rowArray;
}

if (empty($username) || empty($password)) {
    if (empty($username) && empty($password)) {
        $_SESSION['msg'] = "You need to enter email and password for login.";
        $_SESSION['msgNumber'] = 1;
        header("Location: ../index.php");
    } else if (empty($username)) {
        $_SESSION['msg'] = "You did not enter email address. Try again!!";
        $_SESSION['msgNumber'] = 1;
        header("Location: ../index.php");
    } else if (empty($password)) {
        $_SESSION['msg'] = "You did not enter password. Try again!!";
        $_SESSION['msgNumber'] = 1;
        header("Location: ../index.php");
    }

} else if (isset($username) && isset($password)) {

    if ((sizeof($result)) > 0) {
        /*
        email checking was not needed here as query is executed based on email so database should only pull info
        if email is correct. But as we are not checking up on creation if account with same email added before
        therefore user can create multiple accounts with same email address. Just to make it little more robust
        checking both email and password.
        */
        if($password == $row["user_password"] && $username == $row["user_email"]) {
            $_SESSION['user_email'] = $username;
            $_SESSION['user_firstName'] = $row['user_firstName'];
            $_SESSION['user_accessLevel'] = $row['user_accessLevel'];
            $_SESSION['msgNumber'] = 0;
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['msg'] = "Entered wrong user name or password. Try again with valid login details.";
            $_SESSION['msgNumber'] = 1;
            header("Location: ../index.php");
        }
    } else {
        //echo "if can read me then probably my code is broken :);)";
        $_SESSION['msg'] = "If can read me then probably my code is broken :)";
        $_SESSION['msgNumber'] = 1;
        header("Location: ../index.php");
    }
}
?>