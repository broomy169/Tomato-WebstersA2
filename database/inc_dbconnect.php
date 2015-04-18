<?php
try {
    /*
    This file is used to connect to database sqlite file. Please include all pages here that needs to connect to the DB
    */

    $dbh = new PDO("sqlite:database.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>