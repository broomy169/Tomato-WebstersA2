<?php

isset($urlVar) || $urlVar = "";
include($urlVar."inc_dbconnect.php");

$debugOn = true;

if ($_REQUEST['submit'] == "X")
{
    $sql = "DELETE FROM Band WHERE band_id = '$_REQUEST[band_id]'";
    if ($dbh->exec($sql))
        header("Location: manageband.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Band/Artists editing - TCMC</title>
</head>
<body>
<p><a href="manageband.php">Return to band database</a></p>
<h1>Results</h1>

<?php
echo "<h2>Data</h2>";

// execute the appropriate query based on which submit button (insert, delete or update) was clicked
if ($_REQUEST['submit'] == "Add Entry") 
{
    include_once("upload_icon.php");
    include_once("upload_image.php");
    $iconUrl = (string)$thumbFullName;
    $imageUrl = (string)$newFullName;

    // uploadIcon's $thumbFullName === image url that will be saved as string to the database server

    //converting special characters to html code for storing in database correctly.
    $phone = htmlspecialchars($_REQUEST[band_phone]);
    $email = htmlspecialchars($_REQUEST[band_email]);
    $website = htmlspecialchars($_REQUEST[band_website]);
    $shortBio = htmlspecialchars($_REQUEST[band_shortBio]);
    $longBio = htmlspecialchars($_REQUEST[band_longBio]);

    $sql = "INSERT INTO Band (band_name, band_email, band_phone, band_website, band_shortBio, band_longBio, band_genre, band_promoIcon, band_promoPic) VALUES ('$_REQUEST[band_name]', '$email', '$phone', '$website', '$shortBio', '$longBio', '$_REQUEST[band_genre]', '$iconUrl', '$imageUrl')";

    /*
     * attempting to include upload_file.php so every time add entery is clicked file is upload on same time. this will save user time by one click add information
     *
     */

    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Inserted $_REQUEST[band_name]";
    else
        echo "Not inserted"; // in case it didn't work - e.g. if database is not writeable
}

else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM Band WHERE band_id = '$_REQUEST[band_id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Deleted $_REQUEST[band_name]";
    else
        echo "Not deleted";
}
else if ($_REQUEST['submit'] == "Update Information")
{

    include_once("update_icon.php");
    include_once("update_image.php");
    $iconUrl = (string)$thumbFullName;
    $imageUrl = (string)$newFullName;

    //converting special characters to html code for storing in database correctly.
    $phone = htmlspecialchars($_REQUEST[band_phone]);
    $email = htmlspecialchars($_REQUEST[band_email]);
    $website = htmlspecialchars($_REQUEST[band_website]);
    $shortBio = htmlspecialchars($_REQUEST[band_shortBio]);
    $longBio = htmlspecialchars($_REQUEST[band_longBio]);

    $sql = "UPDATE Band SET band_name = '$_REQUEST[band_name]', band_email = '$email', band_phone =
'$phone', band_website = '$website', band_shortBio = '$shortBio', band_longBio = '$longBio', band_genre = '$_REQUEST[band_genre]', band_promoIcon = '$iconUrl', band_promoPic = '$imageUrl'  WHERE
band_id = '$_REQUEST[band_id]'";


    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Updated $_REQUEST[band_name]";
    else
        echo "Not updated";
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
    //echo "<pre>";
// one row at a time:
    /*	$row = $result->fetch(PDO::FETCH_ASSOC);
        print_r($row);
        echo "<br />\n";
        $row = $result->fetch(PDO::FETCH_ASSOC);
        print_r($row);
    */
// all rows in one associative array
    $rows = $result->fetchall(PDO::FETCH_ASSOC);
    echo "<h3>There are total " . count($rows) . " records in Database." . "</h3><br />\n\n";
    //print_r($rows);
    //echo "</pre>";
    //echo "<br />\n";
}
$record = 1;
foreach ($dbh->query($sql) as $row)
{
    print "<b>Record $record" . '<br />' . "</b>";
    print "\tRecord ID: " . '<b>' . $row[band_id] . '</b>' . "<br />";
    print "\tName: " . '<b>' . $row[band_name] . '</b>' . '</b>' . "<br />";
    print "\tEmail: " . '<b>' . $row[band_email] . '</b>' . "<br />";
    print "\tPhone: " . '<b>' . $row[band_phone] . '</b>' . "<br />";
    print "\tWebsite: " . '<b>' . $row[band_website] . '</b>' . "<br />";
    print "\tShort Bio: " . '<b>' . $row[band_shortBio] . '</b>' . "<br />";
    print "\tlong Bio: " . '<b>' . $row[band_longBio] . '</b>' . "<br />";
    print "\tIcon path: " . '<b>' . $row[band_promoIcon] . '</b>' . "<br />";
    print "\tPicture path: " . '<b>' . $row[band_promoPic] . '</b>' . "<br />";
    print "\tGenre: " . '<b>' . $row[band_genre] . '</b>' . "<br /><br />\n";
    $record++;
    echo "</pre>";
}

// close the database connection
$dbh = null;
?>
<p><a href="manageband.php">Return to band database</a></p>
</body>
</html>