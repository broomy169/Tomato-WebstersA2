<?php
session_start();
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$debugOn = true;

if ($_REQUEST['submit'] == "Sign Up"){

    $sql = "INSERT INTO Users (user_firstName, user_lastName, user_phone, user_phoneAfterHours, user_mobile, user_address,
user_email, user_password, user_accessLevel) VALUES ('$_REQUEST[user_firstName]', '$_REQUEST[user_lastName]',
'$_REQUEST[user_phone]', '$_REQUEST[user_phoneAfterHours]', '$_REQUEST[user_mobile]',
'$_REQUEST[user_address]', '$_REQUEST[user_email]', '$_REQUEST[user_password]', '$_REQUEST[user_accessLevel]')";

    if ($dbh->exec($sql)) {
        $_SESSION['signUpMsg'] = "Congratulations! New account has been successfully created for you. Please login
         to access TCMC website features. Thank you.";
        echo "<div id='signup'><h2>Inserted new user: $_REQUEST[user_firstName]</h2></div>";
    } else {
        $_SESSION['signUpMsg'] = "Could not create account for you. Most likely backend issue. Please contact TCMC or
         try again later.";
        echo "<div id='signup'><h2>User not Inserted</h2></div>";
    }

    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";


} else {
    echo "This page did not come from a valid form submission.<br >\n";
}


/*did not need this code anymore, but keeping in comments for debug purpose
// Basic select and display all contents from table
echo "<h2>Users in Database</h2>\n";
$sql = "SELECT * FROM Users";
$result = $dbh->query($sql);
$resultCopy = $result;

if ($debugOn) {
    $rows = $result->fetchall(PDO::FETCH_ASSOC);
    echo "<h3>" . count($rows) . " records in Database." . "</h3><br >\n\n";
    //print_r($rows);
    //echo "</pre>";
    //echo "<br >\n";
}
*/
$dbh = null;

header("Location: ../signUp.php");
?>
