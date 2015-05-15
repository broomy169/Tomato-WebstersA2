<?php

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$debugOn = true;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Events editing - TCMC</title>
</head>
<style>
    #update {color: #cc0000}
    #info {margin: 5px; border: solid black; padding-left: 10px; padding-top: 10px;}
    a {background-color: #b5ffb0; text-decoration: none; border: double #000000; padding: 4px;}
    a:hover {background-color: #0eff39; border: solid #000000; }
</style>

<body>
<h3><a href="event_manageList.php">Return to Manage Event database</a></h3>
<h1>Results</h1>

<?php
echo "<h2>Data</h2>";

// execute the appropriate query based on which submit button (insert, delete or update) was clicked
if ($_REQUEST['submit'] == "Add Event") 
{
    include_once("band_uploadIcon.php");
    echo "<br><br>";
    include_once("band_uploadImage.php");
    $iconUrl = (string)$thumbFullName;
    $imageUrl = (string)$newFullName;

    // uploadIcon's $thumbFullName === image url that will be saved as string to the database server

    //converting special characters to html code for storing in database correctly.
	$title = htmlspecialchars($_REQUEST['event_title']);
    $phone = htmlspecialchars($_REQUEST['event_phone']);
    $date = htmlspecialchars($_REQUEST['event_date']);
    $shortBio = htmlspecialchars($_REQUEST['event_shortBio']);
    $longBio = htmlspecialchars($_REQUEST['event_longBio']);
	$getuserID = "SELECT user_id FROM Users WHERE user_firstName = 'Jimmy'";
	//$userID = $dbh->query($getuserID);
	
	foreach($dbh->query($getuserID) as $row)
	{
		$userID = $row['user_id'];	
	};

	
    $sql = "INSERT INTO Events (user_id, event_title, event_phone, event_date, event_shortBio, event_longBio, event_promoIcon, event_promoPic) VALUES ('$userID', '$title', '$phone', '$date', '$shortBio', '$longBio', '$iconUrl', '$imageUrl')";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
	
    if ($dbh->exec($sql))
        echo "<div id='update'><h2>Inserted new record: $_REQUEST[event_title]</h2></div>";
    else
        echo "<div id='update'><h2>Not inserted</h2></div>";
}
else {
    echo "This page did not come from a valid form submission.<br />\n";
}
// Basic select and display all contents from table
echo "<h2>Event Records in Database Currently</h2>\n";
$sql = "SELECT * FROM Events";
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
    print "\tRecord ID: " . '<b>' . $row['event_id'] . '</b>' . "<br />";
    print "\tName: " . '<b>' . $row['event_title'] . '</b>' . "<br />";
    print "\tDate: " . '<b>' . $row['event_date'] . '</b>' . "<br />";
    print "\tPhone: " . '<b>' . $row['event_phone'] . '</b>' . "<br />";
    print "\tShort Bio: " . '<b>' . $row['event_shortBio'] . '</b>' . "<br />";
    print "\tlong Bio: " . '<b>' . $row['event_longBio'] . '</b>' . "<br />";
    print "\tIcon path: " . '<b>' . $row['event_promoIcon'] . '</b>' . "<br />";
    print "\tPicture path: " . '<b>' . $row['event_promoPic'] . '</b>' . "<br />";
    $record++;
    echo "\n</div>";
}

// close the database connection
$dbh = null;
?>
<h3><a href="event_manageList.php">Return to Manage Event database</a></h3>
</body>
</html>