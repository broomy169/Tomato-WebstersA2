<?php
try {
    /*
    This file is used to connect to database sqlite file. Please include all files here that needs to connect to the DB
    */

    $db = new PDO("sqlite:database.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>