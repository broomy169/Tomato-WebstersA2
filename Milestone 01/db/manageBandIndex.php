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
            <li><a href="index.php"><h3>Artists and Band</h3></a></li>
            <li><a href="manageBandIndex.php"><h3>Manage Artists and Band(Add/Update/Delete)</h3></a></li>
        </ul>
    </div>
    <?php
	    include("manageBandList.php");
	?>
</body>
</html>