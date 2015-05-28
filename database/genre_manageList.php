<?php

if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['user_email'])){
    header("Location: ../index.php");
}

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");
?>
<script src="database/genre_addValidation.js"></script>
<h1>Manage Band Genre Categories</h1>
<form id="addRecord" name="addRecord" method="post" enctype="multipart/form-data" action="database/genre_databaseProcess
.php">
    <fieldset>
        <h2>Add Genre Category</h2>
        <p><label for="genre_name">Genre Name:- </label><input type="text" name="genre_name" id="genre_name" value="" autofocus>
        <input type="submit" name="submit" id="submit" value="Add Entry" onclick="return genreNameCheck();">
    </fieldset>
</form>
<?php
echo "<h1>Current Band Genre Categories</h1>\n";

// Displaying database information

$sql = "SELECT * FROM Genre";
$result = $dbh->query($sql);
$rows = $result->fetchall(PDO::FETCH_ASSOC);
echo "<h3>" . 'There are total ' . count($rows) . ' records in Database' . "</h3>\n";

$editTally = 0;
foreach ($dbh->query($sql) as $row){
    ++$editTally;

    //single echo added for all html code
    echo "
            <div class='col'>
                <div class='manageList box'>
                    <form id='editRecord' name='editRecord$editTally' method='post' enctype='multipart/form-data' action='database/genre_databaseProcess.php'>
                        <fieldset>
                            <label>Genre Name: </label><input type='text' name='genre_name' value='$row[genre_name]' >
                            <input type='hidden' name='genre_id' value='$row[genre_id]' >
                            <input type='submit' name='submit' value='Update Information' class='updateButton'>
                            <input type='submit' name='submit' value='Delete Entry' class='deleteButton' >
                        </fieldset>
                    </form>
                </div>
            </div>
            \n"
        //single echo ends here
    ;?>
<?php
}
// closing database connection here
$dbh = null;
?>