<!doctype html>
<html>
<head>
    <title>Tomato Websters - Navigation</title>
    <?php
    echo "<link rel='stylesheet' href= 'database/styleBandList.css' type='text/css'>";
	echo "<script src= 'database/expandBand.js' type='text/javascript'></script>";
	?>
</head>
<body>
   	<header><h1>Navigation</h1></header>
    <a href="database/bandList.php"><h2>Display summary/full decription of artists</h2></a>
    <a href="database/manageBandList.php"><h2>Manage artists(Add/Update/Delete)</h2></a>
<?php
	include("database/bandList.php");
	?>
</body>
</html>