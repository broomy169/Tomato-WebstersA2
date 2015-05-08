<!doctype html>
<html>
<head>
    <title>Tomato Websters - Navigation</title>
    <link rel='stylesheet' href= 'styleBandList.css' type='text/css'>
	<script src= 'expandBand.js' type='text/javascript'></script>
</head>
<body>
    <header><h1>Artists and Band</h1></header>
    <div id="nav">
        <ul>
            <li><a href="index.php"><h2>Artists and Band</h2></a></li>
            <li><a href="manageBandIndex.php"><h2>Manage Artists and Band(Add/Update/Delete)</h2></a></li>
        </ul>
    </div>
    <h3>Displaying summary of artists (click for full description)</h3>
    <?php
	include("bandList.php");
	?>
</body>
</html>