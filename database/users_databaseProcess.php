<?php

// checking if session not started then start new session
if (!isset($_SESSION)){
    session_start();
}

// if user entered a link in browser to get here without logging in then following code prevent access to this page.
if (!isset($_SESSION['user_email'])){
    header("Location: ../index.php");
}

// connecting to database
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

//testing purposes
$debugOn = true;


$record = "Record ID " . "'$_REQUEST[user_id]";

if ($_REQUEST['submit'] == "X")
{
    $sql = "DELETE FROM Users WHERE user_id = '$_REQUEST[user_id]'";
    if ($dbh->exec($sql))
        header("Location: users_manageUsers.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Users Managaement - TCMC</title>
</head>
<style>
    #update {color: #cc0000}
    #info {margin: 5px; border: solid black; padding-left: 10px; padding-top: 10px;}
    a {background-color: #b5ffb0; text-decoration: none; border: double #000000; padding: 4px;}
    a:hover {background-color: #0eff39; border: solid #000000; }
</style>

<body>
<h3><a href="users_manageUsers.php">Return to Manage band database</a></h3>
<h1>Results</h1>

<?php
echo "<h2>Data</h2>";

// execute the appropriate query based on submit button (delete or update) was clicked
if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM Users WHERE user_id = '$_REQUEST[user_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "<div id='update'><h2>Deleted: $_REQUEST[user_firstName] $_REQUEST[user_lastName]</h2></div>";
    else
        echo "<div id='update'><h2>Not deleted</h2></div>";
}
else if ($_REQUEST['submit'] == "Update Information")
{

    $sql = "UPDATE Users SET user_firstName = '$_REQUEST[user_firstName]', user_lastName = '$_REQUEST[user_lastName]',
user_phone = '$_REQUEST[user_phone]', user_phoneAfterHours = '$_REQUEST[user_phoneAfterHours]', user_mobile =
'$_REQUEST[user_mobile]', user_email = '$_REQUEST[user_email]', user_password =
'$_REQUEST[user_password]', user_accessLevel = '$_REQUEST[user_accessLevel]',
 user_address = '$_REQUEST[user_address]' WHERE user_id = '$_REQUEST[user_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";

    if ($dbh->exec($sql))
        echo "<div id='update'><h2>Updated $_REQUEST[user_firstName] $_REQUEST[user_lastName] $record</h2></div>";
    else
        echo "<div id='update'><h2>Not updated</h2></div>";
}
else {
    echo "This page did not come from a valid form submission.<br />\n";
}
echo "</strong></p>\n";

// Basic select and display all contents from table
echo "<h2>Users in Database Currently</h2>\n";
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
$record = 1;
foreach ($dbh->query($sql) as $row)
{
    echo "<div id='info'>";
    print "<b>Record $record" . '<br />' . "</b>";
    print "\tRecord ID: " . '<b>' . $row['user_id'] . '</b>' . "<br />";
    print "\tName: " . '<b>' . $row['user_firstName'] . ' ' . $row['user_lastName']. '</b>' . "<br />";
    print "\tEmail: " . '<b>' . $row['user_email'] . '</b>' . "<br />";
    print "\tPhone: " . '<b>' . $row['user_phone'] . '</b>' . "<br />";
    print "\tAfter Hours contact: " . '<b>' . $row['user_phoneAfterHours'] . '</b>' . "<br />";
    print "\tMobile: " . '<b>' . $row['user_mobile'] . '</b>' . "<br />";
    print "\tAccess Level: " . '<b>' . $row['user_accessLevel'] . '</b>' . "<br />";
    print "\tAddress: " . '<b>' . $row['user_address'] . '</b>' . "<br />";
    $record++;
    echo "\n</div>";
}

// close the database connection
$dbh = null;
?>
<h3><a href="users_manageUsers.php">Return to Manage band database</a></h3>
</body>
</html>