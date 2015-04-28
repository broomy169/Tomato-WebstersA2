<!doctype html>
<html>
<head>
    <title>Tomato Websters - Navigation</title>
    <?php
    echo "<link rel='stylesheet' href= 'styleband.css' type='text/css'>";
	echo "<script src= 'expandband.js' type='text/javascript'></script>";
	?>
</head>
<body>
   	<header><h1>Navigation</h1></header>
    <a href="manageband.php"><h2>Manage artists(Add/Update/Delete)</h2></a>
    <h3>Displaying summary of artists (click for full description)</h3>
<?php
	include("band.php");
	?>
</body>
</html>