<!doctype html>
<html>
<head>
    <title>Tomato Websters - Navigation</title>
    <?php
    echo "<link rel='stylesheet' href= 'database/styleband.css' type='text/css'>";
	echo "<script src= 'database/expandband.js' type='text/javascript'></script>";
	?>
</head>
<body>
   	<header><h1>Navigation</h1></header>
    <a href="database/band.php"><h2>Display summary/full decription of artists</h2></a>
    <a href="database/manageband.php"><h2>Manage artists(Add/Update/Delete)</h2></a>
<?php
	include("database/band.php");
	?>
</body>
</html>