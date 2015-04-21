<?php
//added connection
include("inc_dbconnect.php");
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Band and Artists - TCMC</title>
    <link href="styleband.css" type="text/css" rel="stylesheet">
    <script src='onloadband.js' type='text/javascript'></script>

</head>
<body>
<h1>Artists and Bands</h1>
<?php $sql = "SELECT * FROM band";
$blockTally = 1;
foreach($dbh->query($sql) as $row){
    $image = "$row[band_promopic]";
    $bandId = "$row[band_id]";
    // band block starts here to style each band/artist information
    echo "<div id='bandBlock$blockTally'>\n";
    echo "<div id='infoBlock'>\n<p><redcolor>$row[band_name]</redcolor></p><p>short bio:
 <redcolor>$row[band_shortbio]</redcolor></p>";
    echo "<div id='moreinfoBlock$blockTally'>\n<h3>Contact details</h3><p>phone: <redcolor>$row[band_phone]</redcolor></p><p>email:
<redcolor>$row[band_email]</redcolor></p><p>website: <redcolor><a href='#'> $row[band_website]</a></redcolor></p>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id='photoBlock'>\n<h2>icon here</h2>\n";
    echo "<div id='morephotoBlock$blockTally'>\n<h2>more photo/Photos? here</h2>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id='clearBlock'>\n";
    echo "</div>\n";
    echo "<input type='button' onclick='expand($blockTally);' id='moreinfo$blockTally' value='more info...'/input>\n";
    echo "<script src='expandband.js' type='text/javascript'></script>";
    // band block finish here
    echo "</div>\n";
    $blockTally++;
}?>
</body>
</html>