<!doctype html>
<html>
<head>
    <title>Tomato Websters - Navigation</title>
    <?php echo "<link rel='stylesheet' href= 'database/band_listStyle.css' type='text/css'>"; echo "<script src= 'database/band_expandInfo.js' type='text/javascript'></script>"; ?>
</head>

<body>
    <header>
        <h1>Navigation</h1>
    </header>
    <a href="database/band_list.php"><h2>Display summary/full decription of artists</h2></a>
    <a href="database/band_manageList.php"><h2>Manage artists(Add/Update/Delete)</h2></a>
    <?php include( "database/band_list.php"); ?>
</body>
</html>