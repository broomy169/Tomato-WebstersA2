<?php
try {
    $dbh = new PDO("sqlite:database/database.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>