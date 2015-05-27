<?php
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");
$debugOn = true;
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sorted Category</title>
    <link rel='stylesheet' href= 'band_manageListStyle.css' type='text/css'>
    <link rel='stylesheet' href= 'band_listStyle.css' type='text/css'>
</head>
<body>
<?php

if ($_REQUEST['submit'] == "Sort Genre") {
    $sortedGenre = $_REQUEST['band_sortGenre'];  
    echo "<h1>Showing $sortedGenre Artists</h1>";
    $record = 1;
    
    $sql = "SELECT * FROM Band WHERE band_genre = '$sortedGenre'";
    $result = $dbh->query($sql);
    $resultCopy = $result;
    foreach ($dbh->query($sql) as $row) {
        print "<b>Record $record" . '<br >' . "</b>";
        print "\tRecord ID: " . '<b>' . $row['band_id'] . '</b>' . "<br >";
        print "\tName: " . '<b>' . $row['band_name'] . '</b>' . "<br >";
        print "\tEmail: " . '<b>' . $row['band_email'] . '</b>' . "<br >";
        print "\tPhone: " . '<b>' . $row['band_phone'] . '</b>' . "<br >";
        print "\tWebsite: " . '<b>' . $row['band_website'] . '</b>' . "<br >";
        print "\tShort Bio: " . '<b>' . $row['band_shortBio'] . '</b>' . "<br >";
        print "\tlong Bio: " . '<b>' . $row['band_longBio'] . '</b>' . "<br >";
        print "\tIcon path: " . '<b>' . $row['band_promoIcon'] . '</b>' . "<br >";
        print "\tPicture path: " . '<b>' . $row['band_promoPic'] . '</b>' . "<br >";
        print "\tGenre: " . '<b>' . $row['band_genre'] . '</b>' . "<br ><br >\n";
        $record++;
    }   
}
$dbh = null;
?>
<h3><a href="band_inc_manageList.php">Return to Manage band database</a></h3>
   
</body>
</html>