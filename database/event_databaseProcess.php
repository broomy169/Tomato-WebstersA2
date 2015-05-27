<?php

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$debugOn = true;
if (!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION['user_email'])){
    header("Location: index.php");
}

echo "<h2>Data</h2>";

// execute the appropriate query based on which submit button (insert, delete or update) was clicked
if ($_REQUEST['submit'] == "Add Event") 
{    
	include_once("uploadIcon.php");
    echo "<br><br>";
    include_once("uploadImage.php");
    $iconUrl = (string)$thumbFullName;
    $imageUrl = (string)$newFullName;
//converting special characters to html code for storing in database correctly.

	$title = htmlspecialchars($_REQUEST['event_title']);
    $phone = htmlspecialchars($_REQUEST['event_phone']);
    $date = htmlspecialchars($_REQUEST['event_date']);
    $venueName = htmlspecialchars($_REQUEST['event_venueName']);
    $venueLocation = htmlspecialchars($_REQUEST['event_venueLocation']);
    $shortBio = htmlspecialchars($_REQUEST['event_shortBio']);
    $longBio = htmlspecialchars($_REQUEST['event_longBio']);
    $priceFull = htmlspecialchars($_REQUEST['event_priceFull']);
    $priceConc = htmlspecialchars($_REQUEST['event_priceConc']);

	$userID = $_SESSION['user_id'];

    $sql = "INSERT INTO Events (user_id, event_title, event_phone, event_date, event_venueName, event_venueLocation, event_shortBio, event_longBio, event_priceFull, event_priceConc, event_promoIcon, event_promoPic) VALUES ('$userID', '$title', '$phone', '$date', '$venueName', '$venueLocation', '$shortBio', '$longBio', '$priceFull', '$priceConc', '$iconUrl', '$imageUrl')";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
	
    if ($dbh->exec($sql)) {
        $_SESSION['Edit'] = "Event " . $_REQUEST['event_title'] . " successfully added";
    } else {
        $_SESSION['Edit'] = "Event " . $_REQUEST['event_title'] . " not added";
    }
} else if ($_REQUEST['submit'] == "Delete Entry") 
{
    $sql = "DELETE FROM Events WHERE event_id = '$_REQUEST[event_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql)){
        $_SESSION['Edit'] = "Event " . $_REQUEST['event_title'] . " successfully deleted";
    } else {
        $_SESSION['Edit'] = "Event " . $_REQUEST['event_title'] . " not deleted";
    }
} else if ($_REQUEST['submit'] == "Update Information") 
{
	include_once("updateIcon.php");
    include_once("updateImage.php");
    $iconUrl = (string)$thumbFullName;
    $imageUrl = (string)$newFullName;

    //converting special characters to html code for storing in database correctly.
	$title = htmlspecialchars($_REQUEST['event_title']);
    $phone = htmlspecialchars($_REQUEST['event_phone']);
    $date = htmlspecialchars($_REQUEST['event_date']);
    $venueName = htmlspecialchars($_REQUEST['event_venueName']);
    $venueLocation = htmlspecialchars($_REQUEST['event_venueLocation']);
    $shortBio = htmlspecialchars($_REQUEST['event_shortBio']);
    $longBio = htmlspecialchars($_REQUEST['event_longBio']);
    $priceFull = htmlspecialchars($_REQUEST['event_priceFull']);
    $priceConc = htmlspecialchars($_REQUEST['event_priceConc']);

    $sql = "UPDATE Events SET event_title = '$_REQUEST[$title]', event_phone = '$phone', event_date ='$date', event_venueName = '$venueName', event_venueLocation = '$venueLocation', event_shortBio = '$shortBio', event_longBio = '$_REQUEST[longBio]', event_priceFull = '$priceFull', 
	event_priceConc = '$priceConc', event_promoIcon = '$iconUrl', event_promoPic = '$imageUrl'  WHERE event_id = '$_REQUEST[event_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";

    if ($dbh->exec($sql)) {
        $_SESSION['Edit'] = "Event " . $_REQUEST['event_title'] . " successfully updated";
    } else {
        $_SESSION['Edit'] = "Event " . $_REQUEST['event_title'] . " not updated";
    }
} else {
    //echo "This page did not come from a valid form submission.<br />\n";
}


/*
// Basic select and display all contents from table
echo "<h2>Event Records in Database Currently</h2>\n";
$sql = "SELECT * FROM Events ORDER BY event_date desc";
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
    print "\tVenue Name: " . '<b>' . $row['event_venueName'] . '</b>' . "<br />";
    print "\tVenue Location: " . '<b>' . $row['event_venueLocation'] . '</b>' . "<br />";
    print "\tShort Bio: " . '<b>' . $row['event_shortBio'] . '</b>' . "<br />";
    print "\tLong Bio: " . '<b>' . $row['event_longBio'] . '</b>' . "<br />";
    print "\tPrice Full: " . '<b>' . $row['event_priceFull'] . '</b>' . "<br />";
	print "\tPromo Icon: " . '<b>' . $row['event_promoIcon'] . '</b>' . "<br />";
	print "\tPromo Pic: " . '<b>' . $row['event_promoPic'] . '</b>' . "<br />";	
    $record++;
    echo "\n</div>";
}
*/
// close the database connection
header("Location: ../events_addPage.php");
$dbh = null;
?>
