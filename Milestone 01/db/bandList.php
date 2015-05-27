<?php
//including connection code for database
//following code will make this file accessible from other directories as well
isset($urlVar) || $urlVar = "";
include($urlVar . "inc_dbConnect.php");

echo "<link rel='stylesheet' href= 'database/band_listStyle.css' type='text/css'>";
echo "<script src= 'database/list_expandInfo.js' type='text/javascript'></script>";

$sql = "SELECT * FROM band";
// counter or tally that helps to distinguish between each record's tags/click/input in JavaScript
$blockTally = 1;

//loop going through each band record and displays its info
foreach($dbh->query($sql) as $row){

    // setting up and storing url links for icon and image
    $iconUrl = $urlVar . $row['band_promoIcon'];
    $imageUrl = $urlVar . $row['band_promoPic'];

    echo "<div id='band$blockTally' class='bandClass' onclick='expand($blockTally);' title='click here for more information' value='hide'>\n";
    echo "<div id='info'>\n<h2>$row[band_name]</h2>\n<h3>$row[band_shortBio]</h3>\n";
    echo "<div id='moreInfo$blockTally' class='moreInfo'>\n<p>$row[band_longBio]</p>\n<ul>\n<li><p
title='contact us on this phone number'>Phone: $row[band_phone]</p></li>\n
<li><p title='click here to email us'>Email: <a href='mailto:$row[band_email]'>$row[band_email]</a></p></li>\n
<li><p title='click here to go to our website'>Website: <a target='_blank' href=$row[band_website]>$row[band_website]</a></p></li>\n";
    echo "</div>\n";
    echo "</div>\n";

    //checking and showing if image already added by user otherwise displaying default image
    if (file_exists($iconUrl)){
        echo "<div id='icon'>\n<h2><img src='$iconUrl'></h2>\n";
    } else {
        echo "<div id='icon'>\n<h2><img src='database/images/defaultTomato.jpg'></h2>\n";
    }
    //echo "<div id='icon'>\n<h2><img src='$iconUrl'></h2>\n";

    //checking and showing if image already added by user otherwise displaying default image
    if (file_exists($imageUrl)){
        echo "<div id='photo$blockTally' class='photo'>\n<li><h2><img src='$imageUrl'></h2>\n";
    } else {
        echo "<div id='photo$blockTally' class='photo'>\n<li><h2><img src='database/images/defaultTomatoLight.jpg'></h2>\n";
    }

    echo "</div>\n";
    echo "</div>\n";
    echo "<div class='clearBlock'><li>\n";
    echo "</div>\n";
    echo "</div>\n";
    $blockTally++;
}?>

