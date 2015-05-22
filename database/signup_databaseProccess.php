<?php
session_start();
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$debugOn = true;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up Process - TCMC</title>
</head>
<style>
    a {background-color: #b5ffb0; text-decoration: none; border: double #000000; padding: 4px;}
    a:hover {background-color: #0eff39; border: solid #000000; }
</style>

<body>
<h3><a href="../signUp.php">Return to Sign Up page</a></h3>

<?php
if ($_REQUEST['submit'] == "Sign Up"){

    $sql = "INSERT INTO Users (user_firstName, user_lastName, user_phone, user_phoneAfterHours, user_mobile, user_address, user_email, user_password, user_accessLevel) VALUES ('$_REQUEST[user_firstName]', '$_REQUEST[user_lastName]', '$_REQUEST[user_phone]', '$_REQUEST[user_phoneAfterHours]', '$_REQUEST[user_mobile]', '$_REQUEST[user_address]', '$_REQUEST[user_email]', '$_REQUEST[user_password]', '$_REQUEST[user_accessLevel]')";


    if ($dbh->exec($sql))
        echo "<div id='signup'><h2>Inserted new user: $_REQUEST[user_firstName]</h2></div>";
    else
        echo "<div id='signup'><h2>User not Inserted</h2></div>";


    echo "<p>Query: " . $sql . "</p>\n<p><strong>";


} else {
    echo "This page did not come from a valid form submission.<br />\n";
}

// Basic select and display all contents from table
echo "<h2>Users in Database</h2>\n";
$sql = "SELECT * FROM Users";
$result = $dbh->query($sql);
$resultCopy = $result;

if ($debugOn) {
    $rows = $result->fetchall(PDO::FETCH_ASSOC);
    echo "<h3>" . count($rows) . " records in Database." . "</h3><br />\n\n";
    //print_r($rows);
    //echo "</pre>";
    //echo "<br />\n";
}

$dbh = null;
?>

<h3><a href="../signUp.php">Return to Sign Up page</a></h3>
</body>
</html>