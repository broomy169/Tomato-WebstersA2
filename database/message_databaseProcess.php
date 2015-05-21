<?php

if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['user_email'])){
    header("Location: ../index.php");
}

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$debugOn = true;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Messages - TCMC</title>
</head>
<style>
    #update {color: #cc0000}
    #info {margin: 5px; border: solid black; padding-left: 10px; padding-top: 10px;}
    a {background-color: #b5ffb0; text-decoration: none; border: double #000000; padding: 4px;}
    a:hover {background-color: #0eff39; border: solid #000000; }
</style>

<body>
<h3><a href="message_manageList.php">Return to Manage Message database</a></h3>
<h1>Results</h1>

<?php
echo "<h2>Data</h2>";

// execute the appropriate query based on which submit button (insert, delete or update) was clicked
if ($_REQUEST['submit'] == "Add Message") 
{
    //converting special characters to html code for storing in database correctly.

	$createDate = htmlspecialchars($_REQUEST['message_createDate']);
	$expDate = htmlspecialchars($_REQUEST['message_expDate']);
	$title = htmlspecialchars($_REQUEST['message_title']);
	$content = htmlspecialchars($_REQUEST['message_content']);
	$link = htmlspecialchars($_REQUEST['message_link']);
	$linkTitle = htmlspecialchars($_REQUEST['message_linkTitle']);

    /*
     * Using session to store logged in users' id instead
     *
    $getuserID = "SELECT user_id FROM Users WHERE user_firstName = 'Test'";
    $userID = $dbh->query($getuserID);
    foreach($dbh->query($getuserID) as $row)
    {
    $userID = $row['user_id'];
    };
    */

    $userID = $_SESSION['user_id'];


        $sql = "INSERT INTO Message (user_id, message_createDate, message_expDate, message_title, message_content, message_link, message_linkTitle) VALUES ('$userID', '$createDate','$expDate','$title','$content','$link','$linkTitle')";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
	
    if ($dbh->exec($sql))
        echo "<div id='update'><h2>Inserted new record: $_REQUEST[message_title]</h2></div>";
    else
        echo "<div id='update'><h2>Not inserted</h2></div>";
}
else {
    echo "This page did not come from a valid form submission.<br />\n";
}
// Basic select and display all contents from table
echo "<h2>Message Records in Database Currently</h2>\n";

$loggedInUserID = $_SESSION['user_id'];

// checking logged in user's access level and displaying information accordingly
if ($_SESSION['user_accessLevel'] == "full" || $_SESSION['user_accessLevel'] == "paid"){
    $sql = "SELECT * FROM Message";

    // displaying messages that are only created by logged in user
} else if ($_SESSION['user_accessLevel'] == "free") {
    $sql = "SELECT * FROM Message WHERE Message.user_id = $loggedInUserID";
}


//$sql = "SELECT * FROM Message";
$result = $dbh->query($sql);
$resultCopy = $result;

if ($debugOn) {
    $rows = $result->fetchall(PDO::FETCH_ASSOC);
    echo "<h3>" . count($rows) . " records in Database." . "</h3><br />\n\n";
	//echo "<pre>";
	//print_r($rows);
	//echo "</pre>";
    //echo "<br />\n";
}
$record = 1;
foreach ($dbh->query($sql) as $row)
{
    echo "<div id='info'>";
    print "<b>Record $record" . '<br />' . "</b>";
    print "\tRecord ID: " . '<b>' . $row['message_id'] . '</b>' . "<br />";
    print "\tAdded by User's ID: " . '<b>' . $row['user_id'] . '</b>' . "<br />";
    print "\tCreate Date: " . '<b>' . $row['message_createDate'] . '</b>' . "<br />";
    print "\tExpiry Date: " . '<b>' . $row['message_expDate'] . '</b>' . "<br />";
    print "\tTitle: " . '<b>' . $row['message_title'] . '</b>' . "<br />";
    print "\tContent: " . '<b>' . $row['message_content'] . '</b>' . "<br />";
    print "\tLink: " . '<b>' . $row['message_link'] . '</b>' . "<br />";
    print "\tLink Title: " . '<b>' . $row['message_linkTitle'] . '</b>' . "<br />";
    $record++;
    echo "\n</div>";
}

// close the database connection
$dbh = null;
?>
<h3><a href="message_manageList.php">Return to Manage Message database</a></h3>
</body>
</html>