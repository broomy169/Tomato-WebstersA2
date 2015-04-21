<?php
//added connection
include("inc_dbconnect.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Band and Artists - TCMC</title>
    <link href="styleband.css" type="text/css" rel="stylesheet">
    <script type="text/javascript">
        //javascript used to expand for more information using button
        //      BUG: all buttons only expand first artist, expanding to full artist information is done through javascript,
        //      need to spend more time on javascript to achieve expandable function

        function expand(count){
            var button = document.getElementById("moreinfo" + count);
            var moreinfoblock = document.getElementById("moreinfoBlock" + count);
            var morephotosblock = document.getElementById("morephotoBlock" + count);
            //document.getElementById("bandBlock" + count).style.border = "groove #81cee3 10px";
            console.log(count);

            if (button.value === "more info..."){
                button.value = "less info..";
                moreinfoblock.style.display = "block";
                morephotosblock.style.display = "block";

            } else {
                button.value = "more info...";
                moreinfoblock.style.display = "none";
                morephotosblock.style.display = "none";
            }
        }
    </script>
    <style>
        #morephotoBlock {display: none;}
        #moreinfoBlock {display: none; }
        #moreinfo {width: 100%; margin-bottom: 1px; text-align: center;}
    </style>
</head>
<body>
<h1>Artists and Bands</h1>
<?php $sql = "SELECT * FROM band";
$count = 1;
foreach($dbh->query($sql) as $row){
    $image = "$row[band_promopic]";
    $bandId = "$row[band_id]";
    // band block starts here to style each band/artist information
    echo "<div id='bandBlock$count'>\n";
    echo "<div id='infoBlock'>\n<p><redcolor>$row[band_name]</redcolor></p><p>short bio:
 <redcolor>$row[band_shortbio]</redcolor></p>";
    echo "<div id='moreinfoBlock$count'>\n<h3>Contact details</h3><p>phone: <redcolor>$row[band_phone]</redcolor></p><p>email:
<redcolor>$row[band_email]</redcolor></p><p>website: <redcolor><a href='#'> $row[band_website]</a></redcolor></p>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id='photoBlock'>\n<h2>icon here</h2>\n";
    echo "<div id='morephotoBlock$count'>\n<h2>more photo/Photos? here</h2>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id='clearBlock'>\n";
    echo "</div>\n";
    echo "<input type='button' onclick='expand($count);' id='moreinfo$count' value='more info...'/input>\n";
    // band block finish here
    echo "</div>\n";
    $count++;
}?>
</body>
</html>