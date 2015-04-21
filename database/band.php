<?php
//added connection
include("inc_dbconnect.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Band and Artists - TCMC</title>
    <link href="styleband.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php $sql = "SELECT * FROM band";
$blockTally = 1;
foreach($dbh->query($sql) as $row){

    echo "<div id='band$blockTally'>\n";
    echo "<div id='info'>\n<h2>$row[band_name]</h2>\n<h3>$row[band_shortbio]</h3>\n";

    echo "<div id='moreInfo$blockTally' class='moreInfo'>\n<ul>\n<li>$row[band_phone]</li>\n<li>$row[band_email]
</li>\n<li><a href=$row[band_website]>$row[band_website]</a></li>\n</ul>\n";

    echo "</div>\n";
    echo "</div>\n";
    echo "<div id='icon'>\n<h2>icon here</h2>\n";
    echo "<div id='photo$blockTally' class='photo'>\n<h2>more photo/Photos? here</h2>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id='clearBlock'>\n";
    echo "</div>\n";
    echo "<input type='button' onclick='expand($blockTally);' id='button$blockTally' class='expandButton' value='more info...'/input>\n";
    echo "<script src='expandband.js' type='text/javascript'></script>";
    echo "</div>\n";
    $blockTally++;
}?>
</body>
</html>