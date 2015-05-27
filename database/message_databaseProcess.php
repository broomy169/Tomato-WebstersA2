<?php

if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['user_email'])){
    header("Location: index.php");
}

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

$debugOn = true;
?>

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

    $userID = $_SESSION['user_id'];


        $sql = "INSERT INTO Message (user_id, message_createDate, message_expDate, message_title, message_content, message_link, message_linkTitle) VALUES ('$userID', '$createDate','$expDate','$title','$content','$link','$linkTitle')";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
	
    if ($dbh->exec($sql)) {
        $_SESSION['Edit'] = "Message " . $_REQUEST['message_title'] . " successfully added.";
    } else {
        $_SESSION['Edit'] = "Message " . $_REQUEST['message_title'] . " not added.";

    }
} else if ($_REQUEST['submit'] == "Delete Entry") 
{
    $sql = "DELETE FROM Message WHERE message_id = '$_REQUEST[message_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql)) {
        $_SESSION['Edit'] = "Message " . $_REQUEST['message_title'] . " deleted successfully";
    } else {
        $_SESSION['Edit'] = "Message " . $_REQUEST['message_title'] . " not deleted";
    }
} else if ($_REQUEST['submit'] == "Update Information") 
{

    include_once("updateIcon.php");
    include_once("updateImage.php");
    $iconUrl = (string)$thumbFullName;
    $imageUrl = (string)$newFullName;

    //converting special characters to html code for storing in database correctly.
	
	$expDate = htmlspecialchars($_REQUEST['message_expDate']);
	$title = htmlspecialchars($_REQUEST['message_title']);
	$content = htmlspecialchars($_REQUEST['message_content']);
	$link = htmlspecialchars($_REQUEST['message_link']);
	$linkTitle = htmlspecialchars($_REQUEST['message_linkTitle']);
	
    $sql = "UPDATE Message SET message_expDate= '$_REQUEST[$expDate]', message_title = '$title', message_content ='$content', message_link = '$link', message_linkTitle = '$linkTitle' WHERE message_id = '$_REQUEST[message_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";

    if ($dbh->exec($sql)) {
        $_SESSION['Edit'] = "Message " . $_REQUEST['message_title'] . " updated successfully";
    } else {
        $_SESSION['Edit'] = "Message " . $_REQUEST['message_title'] . " not updated";
    }
} else {
    //echo "This page did not come from a valid form submission.<br />\n";
}

// close the database connection
header("Location: ../message_addPage.php");
$dbh = null;

?>