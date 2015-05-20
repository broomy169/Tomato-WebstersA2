<?php
// if user entered a link in browser to get here without logging in then following code prevent access to this page.
if (!isset($_SESSION['user_email'])){
    header("Location: ../index.php");
}

// checking if session not started then start new session
if (!isset($_SESSION)){
    session_start();
}

// connecting to database
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

//testing purposes
$debugOn = true;

if ($_REQUEST['submit'] == "X")
{
    $sql = "DELETE FROM Band WHERE band_id = '$_REQUEST[band_id]'";
    if ($dbh->exec($sql))
        header("Location: band_manageList.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Band/Artists editing - TCMC</title>
</head>
<style>
    #update {color: #cc0000}
    #info {margin: 5px; border: solid black; padding-left: 10px; padding-top: 10px;}
    a {background-color: #b5ffb0; text-decoration: none; border: double #000000; padding: 4px;}
    a:hover {background-color: #0eff39; border: solid #000000; }
</style>

<body>
<h3><a href="band_manageList.php">Return to Manage band database</a></h3>
<h1>Results</h1>

<?php
echo "<h2>Data</h2>";

// execute the appropriate query based on which submit button (insert, delete or update) was clicked
if ($_REQUEST['submit'] == "Add Entry") 
{
    include_once("band_uploadIcon.php");
    echo "<br><br>";
    include_once("band_uploadImage.php");
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

    if ($dbh->exec($sql))
        echo "<div id='update'><h2>Inserted new record: $_REQUEST[band_name]</h2></div>";
    else
        echo "<div id='update'><h2>Not inserted</h2></div>";
}

else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM Band WHERE band_id = '$_REQUEST[band_id]'";
    //echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "<div id='update'><h2>Deleted: $_REQUEST[band_name]</h2></div>";
    else
        echo "<div id='update'><h2>Not deleted</h2></div>";
}
else if ($_REQUEST['submit'] == "Update Information")
{

    include_once("band_updateIcon.php");
    include_once("band_updateImage.php");
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

    if ($dbh->exec($sql))
        echo "<div id='update'><h2>Updated $_REQUEST[band_name] $record</h2></div>";
    else
        echo "<div id='update'><h2>Not updated</h2></div>";
}
else {
    echo "This page did not come from a valid form submission.<br />\n";
}
echo "</strong></p>\n";

// Basic select and display all contents from table
echo "<h2>Band Records in Database Currently</h2>\n";
$sql = "SELECT * FROM Band";
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
    print "\tRecord ID: " . '<b>' . $row['band_id'] . '</b>' . "<br />";
    print "\tName: " . '<b>' . $row['band_name'] . '</b>' . "<br />";
    print "\tEmail: " . '<b>' . $row['band_email'] . '</b>' . "<br />";
    print "\tPhone: " . '<b>' . $row['band_phone'] . '</b>' . "<br />";
    print "\tWebsite: " . '<b>' . $row['band_website'] . '</b>' . "<br />";
    print "\tShort Bio: " . '<b>' . $row['band_shortBio'] . '</b>' . "<br />";
    print "\tlong Bio: " . '<b>' . $row['band_longBio'] . '</b>' . "<br />";
    print "\tIcon path: " . '<b>' . $row['band_promoIcon'] . '</b>' . "<br />";
    print "\tPicture path: " . '<b>' . $row['band_promoPic'] . '</b>' . "<br />";
    print "\tGenre: " . '<b>' . $row['band_genre'] . '</b>' . "<br /><br />\n";
    $record++;
    echo "\n</div>";
}

// close the database connection
$dbh = null;
?>
<h3><a href="band_manageList.php">Return to Manage band database</a></h3>
</body>
</html>