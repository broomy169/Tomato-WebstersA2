<?php
//added connection
include("inc_dbconnect.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Band and Artists - TCMC</title>
    <link href="styleband.css" type="text/css" rel="stylesheet">
    <script>
        //javascript used to expand for more information using button
        //      BUG: all buttons only expand first artist, expanding to full artist information is done through javascript,
        //      need to spend more time on javascript to achieve expandable function
        function expand(bandId){
            var button = document.getElementById("moreinfo");
            var moreinfoblock = document.getElementById("moreinfoBlock");
            var morephotosblock = document.getElementById("morephotoBlock");
            console.log(bandId);

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
</head>
<body>
<h1>Artists and Bands</h1>

<?php $sql = "SELECT * FROM band";
foreach($dbh->query($sql) as $row){
    $image = "$row[band_promopic]";
    $bandId = "$row[band_id]";
    // band block starts here to style each band/artist information
    echo "<div id=\"bandBlock\">\n";
    echo "<div id=\"infoBlock\">\n<p>Band/Artist name: <redcolor>$row[band_name]</redcolor></p><p>short bio:
 <redcolor>$row[band_shortbio]</p>";
    echo "<div id=\"moreinfoBlock\">\n<h3>Contact details</h3><p>phone: <redcolor>$row[band_phone]</redcolor></p>email:
<redcolor>$row[band_email]</redcolor><p>website: <redcolor>$row[band_website]</redcolor></p>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id=\"photoBlock\">\n<h2>icon here</h2>\n";
    echo "<div id=\"morephotoBlock\">\n<h2>more photo/Photos? here</h2>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<div id=\"clearBlock\">\n";
    echo "</div>\n";
    echo "<input type=\"button\" onclick=\"expand($bandId);\" id=\"moreinfo\" value=\"more info...\"/input>\n";
    // band block finish here
    echo "</div>\n";}?>

</body>
</html>
