<?php
//following code makes sqlite url accessible from local and other directory files
isset($urlVar) || $urlVar = "";
try {

    $dbh = new PDO("sqlite:".$urlVar."database.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>