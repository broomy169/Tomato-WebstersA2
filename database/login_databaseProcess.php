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

//testing here only
echo "user name and password passing for process is: ";
echo "<p>UserName :" . " " .$username . "</p>";

$sql = "SELECT * FROM Users WHERE user_email = '$username'";

$result = $dbh->query($sql);
foreach ($result as $rowArray){
    $row = $rowArray;
}

if (empty($username) || empty($password)) {
    if (empty($username) && empty($password)) {
        echo "Please enter email and password";
    } else if (empty($username)) {
        echo "Please enter email";
    } else if (empty($password)) {
        echo "Please enter password";
    }

} else if (isset($username) && isset($password)) {

    if ((sizeof($result)) > 0) {
        if($password == $row["user_password"]) {
            $_SESSION['user_email'] = $username;
            $_SESSION['user_firstName'] = $row['user_firstName'];
            //echo "<p>Logged in as " . $row['user_firstName'] . "</p>";
            header("Location: ../index.php");
            exit();

        } else {
            echo "Entered wrong user name or password ";
        }
    } else {
        echo "You can't get here. if can see me that means my code is broken ;)";
    }
}

?>


