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
    $imgUrl = (string)$newFullName;

    // uploadIcon's $thumbFullName === image url that will be saved as string to the database server

    $sql = "INSERT INTO Band (band_name, band_email, band_phone, band_website, band_shortBio, band_longBio, band_genre, band_promoIcon, band_promoPic) VALUES ('$_REQUEST[band_name]', '$_REQUEST[band_email]', '$_REQUEST[band_phone]', '$_REQUEST[band_website]', '$_REQUEST[band_shortBio]', '$_REQUEST[band_longBio]', '$_REQUEST[band_genre]', '$iconUrl', '$imgUrl')";

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

    $sql = "UPDATE Band SET band_name = '$_REQUEST[band_name]', band_email = '$_REQUEST[band_email]', band_phone =
'$_REQUEST[band_phone]', band_website = '$_REQUEST[band_website]', band_shortBio =
'$_REQUEST[band_shortBio]', band_longBio = '$_REQUEST[band_longBio]', band_genre = '$_REQUEST[band_genre]' WHERE
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
    echo "<pre>";
// one row at a time:
    /*	$row = $result->fetch(PDO::FETCH_ASSOC);
        print_r($row);
        echo "<br />\n";
        $row = $result->fetch(PDO::FETCH_ASSOC);
        print_r($row);
    */
// all rows in one associative array
    $rows = $result->fetchall(PDO::FETCH_ASSOC);
    echo count($rows) . " records in table<br />\n";
    print_r($rows);
    echo "</pre>";
    echo "<br />\n";
}
foreach ($dbh->query($sql) as $row)
{
    print $row[band_name] .' - '. $row[band_phone] . ' - ' . $row[band_email] . "<br />\n";
}

// close the database connection
$dbh = null;
?>
<p><a href="manageband.php">Return to band database</a></p>
</body>
</html>