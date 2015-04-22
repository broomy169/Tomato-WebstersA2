<?php
//includes connection code for database
include("database/inc_dbconnect.php");

echo "<link rel='stylesheet' href='database/styleband.css' type='text/css'>";
echo "<script src='database/expandband.js' type='text/javascript'></script>";

$sql = "SELECT * FROM band";

// counter/tally that helps to distinguish between each record's tags/button in JavaScript
$blockTally = 1;

//loop going through each band record and displays it
foreach($dbh->query($sql) as $row){

    echo "<div id='band$blockTally' class='bandClass'>\n";
    echo "<div id='info'>\n<h2>$row[band_name]</h2>\n<h3>$row[band_shortbio]</h3>\n";
    echo "<div id='moreInfo$blockTally' class='moreInfo'>\n<h3>$row[band_longbio]</h3>\n<ul>\n<li>($row[band_phone])</li>\n<li>$row[band_email]
</li>\n<li><a href=$row[band_website]>$row[band_website]</a></li>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id='icon'>\n<h2>icon here</h2>\n";
    echo "<div id='photo$blockTally' class='photo'>\n<li><h2>more photo/Photos? here</h2>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id='clearBlock'><li>\n";
    echo "</div>\n";
    echo "<input type='button' onclick='expand($blockTally);' id='button$blockTally' class='expandButton' value='more info...'/input>\n";
    echo "</div>\n";

    $blockTally++;
}?>