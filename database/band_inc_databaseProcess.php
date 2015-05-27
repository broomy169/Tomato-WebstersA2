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

// execute the appropriate query based on which submit button (insert, delete or update) was clicked
if ($_REQUEST['submit'] == "Add Entry") 
{
    include_once("uploadIcon.php");
    echo "<br><br>";
    include_once("uploadImage.php");
    $iconUrl = (string)$thumbFullName;
    $imageUrl = (string)$newFullName;

    // uploadIcon's $thumbFullName === image url that will be saved as string to the database server

    //converting special characters to html code for storing in database correctly.
    $phone = htmlspecialchars($_REQUEST['band_phone']);
    $email = htmlspecialchars($_REQUEST['band_email']);
    $website = htmlspecialchars($_REQUEST['band_website']);
    $shortBio = htmlspecialchars($_REQUEST['band_shortBio']);
    $longBio = htmlspecialchars($_REQUEST['band_longBio']);

    $sql = "INSERT INTO Band (band_name, band_email, band_phone, band_website, band_shortBio, band_longBio, band_genre, band_promoIcon, band_promoPic) VALUES ('$_REQUEST[band_name]', '$email', '$phone', '$website', '$shortBio', '$longBio', '$_REQUEST[band_genre]', '$iconUrl', '$imageUrl')";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";

    if ($dbh->exec($sql)) {
        $_SESSION['bandEdit'] = "Band " . $_REQUEST[band_name] . " added successfully.";
    } else {
        $_SESSION['bandEdit'] = "Band " . $_REQUEST[band_name] . " not added.";
    }
}

else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM Band WHERE band_id = '$_REQUEST[band_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        $_SESSION['bandEdit'] = "Band " . $_REQUEST[band_name] . " deleted successfully.";
    else
        $_SESSION['bandEdit'] = "Band " . $_REQUEST[band_name] . ". not deleted";
}
else if ($_REQUEST['submit'] == "Update Information") {

    include_once("updateIcon.php");
    include_once("updateImage.php");
    $iconUrl = (string)$thumbFullName;
    $imageUrl = (string)$newFullName;

    //converting special characters to html code for storing in database correctly.
    $phone = htmlspecialchars($_REQUEST['band_phone']);
    $email = htmlspecialchars($_REQUEST['band_email']);
    $website = htmlspecialchars($_REQUEST['band_website']);
    $shortBio = htmlspecialchars($_REQUEST['band_shortBio']);
    $longBio = htmlspecialchars($_REQUEST['band_longBio']);

    $sql = "UPDATE Band SET band_name = '$_REQUEST[band_name]', band_email = '$email', band_phone =
'$phone', band_website = '$website', band_shortBio = '$shortBio', band_longBio = '$longBio', band_genre = '$_REQUEST[band_genre]', band_promoIcon = '$iconUrl', band_promoPic = '$imageUrl'  WHERE
band_id = '$_REQUEST[band_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";

    if ($dbh->exec($sql)) {
        $_SESSION['bandEdit'] = "Band " . $_REQUEST[band_name] . " details successfully updated";
    } else {
        $_SESSION['bandEdit'] = "Band " . $_REQUEST[band_name] . " details not updated";
    }
}
else {
    //echo "This page did not come from a valid form submission.<br />\n";
}

// close the database connection
header("Location: ../bands_addPage.php");
$dbh = null;

?>