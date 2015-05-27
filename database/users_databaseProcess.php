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

//$record = "Record ID " . "'$_REQUEST[user_id]";


// execute the appropriate query based on submit button (delete or update) was clicked
if ($_REQUEST['submit'] == "Update Information")
{

    $sql = "UPDATE Users SET user_firstName = '$_REQUEST[user_firstName]', user_lastName = '$_REQUEST[user_lastName]',
user_phone = '$_REQUEST[user_phone]', user_phoneAfterHours = '$_REQUEST[user_phoneAfterHours]', user_mobile =
'$_REQUEST[user_mobile]', user_email = '$_REQUEST[user_email]', user_password =
'$_REQUEST[user_password]', user_accessLevel = '$_REQUEST[user_accessLevel]',
 user_address = '$_REQUEST[user_address]' WHERE user_id = '$_REQUEST[user_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";


    if ($dbh->exec($sql)) {
        $_SESSION['userEdit'] = "Member " . $_REQUEST[user_firstName]. " " . $_REQUEST[user_lastName] ."'s details
         successfully updated";
        //echo "<div id='update'><h2>Updated $_REQUEST[user_firstName] $_REQUEST[user_lastName] $record</h2></div>";
    } else {
        $_SESSION['userEdit'] = "Member " . $_REQUEST[user_firstName] .  " " . $_REQUEST[user_lastName] . "'s details
        Not updated. Back end issue,
        contact system/server administrator";
        //echo "<div id='update'><h2>Not updated</h2></div>";
    }
}

else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM Users WHERE user_id = $_REQUEST[user_id]";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql)) {
        $_SESSION['userEdit'] = "Member " . $_REQUEST[user_firstName]. " " . $_REQUEST[user_lastName] . "
        successfully Deleted.";
        //echo "<div id='update'><h2>Deleted: $_REQUEST[band_name]</h2></div>";
    } else {
        $_SESSION['userEdit'] = "Member " . $_REQUEST[user_firstName]. " " . $_REQUEST[user_lastName] . "
        not Deleted. Please contact system/server admin";
        //echo "<div id='update'><h2>Not deleted</h2></div>";
    }
}

else {
    //echo "This page did not come from a valid form submission.<br />\n";
}

/* not displaying all users info anymore as information sent through session message

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
*/

// close the database connection
$dbh = null;
header("Location: ../users_addPage.php");
?>