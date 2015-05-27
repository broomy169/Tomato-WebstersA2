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


// execute the appropriate query based on submit button (delete or update) was clicked
if ($_REQUEST['submit'] == "Add Entry")
{

    $sql = "INSERT INTO Genre (genre_name) VALUES ('$_REQUEST[genre_name]')";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";

    if ($dbh->exec($sql)) {
        $_SESSION['Edit'] = "Genre category " . $_REQUEST[genre_name] . " successfully added";
    } else {
        $_SESSION['Edit'] = "Genre category " . $_REQUEST[genre_name] . " not added. Please contact system/server admin";
    }
}

else if ($_REQUEST['submit'] == "Update Information")
{

    $sql = "UPDATE Genre SET genre_name = '$_REQUEST[genre_name]' WHERE genre_id = '$_REQUEST[genre_id]'";

    if ($dbh->exec($sql)) {
        $_SESSION['Edit'] = "Genre category " . $_REQUEST[genre_name] . " successfully updated";
    } else {
        $_SESSION['Edit'] = "Genre category " . $_REQUEST[genre_name] . " not updated. Please contact system/server admin";
    }
}

else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM Genre WHERE genre_id = $_REQUEST[genre_id]";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql)) {
        $_SESSION['Edit'] = "Genre category " . $_REQUEST[genre_name] . " successfully deleted";
    } else {
        $_SESSION['Edit'] = "Genre category " . $_REQUEST[genre_name] . " not Deleted. Please contact system/server admin";
    }
}

else {
    //echo "This page did not come from a valid form submission.<br />\n";
}

// close the database connection
$dbh = null;
header("Location: ../genre_addPage.php");
?>