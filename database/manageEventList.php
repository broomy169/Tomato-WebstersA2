<?php
isset($urlVar) || $urlVar = "";
include($urlVar . "inc_dbConnect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Band/Artists - TCMC</title>
    <link rel='stylesheet' href= 'manageEventListStylesheet.css' type='text/css'>
    <script src= 'validateAddForm.js' type='text/javascript'></script>
    <script src= 'validateEditForm.js' type='text/javascript'></script>
</head>
<body>
<div id="pageWrapper">
<h1>Manage (Add/remove/update) Events</h1>
<form id="addEvent" name="addEvent" method="post" enctype="multipart/form-data" action="dbProcessEvent.php">
    <fieldset>
        <h2>Insert/Add new Event record:</h2>
        <p><span class="error">* required field</span></p>
        <p><label for="event_date">Event Date:- </label><input type="text" name="event_date" id="event_date" value="">
        <span class="error">*</span></p>
        <p><label for="event_title">Event Name:- </label><input type="text" name="event_title" id="event_title" value="">
        <span class="error">*</span></p>
        <p><label for="event_phone">Phone:- </label><input type="text" name="event_phone" id="event_phone" value="">
        <p><label for="event_shortBio">Short Bio:- </label><textarea type="text" name="event_shortBio" id="event_shortBio"></textarea></p>
        <p><label for="event_longBio">Long Bio:- </label><textarea type="text" name="event_longBio" id="event_longBio"></textarea></p>
        <p><label for="file">Upload Icon/Logo:</label><input type="file" name="iconfile" id="iconfile" value=""/><span class="error">*</span></p></p>
        <p><label for="file">Upload Image:</label><input type="file" name="imagefile" id="imagefile" value=""/><span class="error">*</span></p></p>
        <input type="submit" name="submit" id="submit" value="Add Entry" onClick="">
        <label><br/></label>
        <div id="box" title="Things to note">
        <label><p>Note:</p> </label>
        <p> - Individual upload for icon or photo not allowed. When adding or updating record, both photo and icon must be uploaded on same time. </p>
        </div>
    </fieldset>
</form>
    <?php
    echo "<fieldset>\n";
    echo "<h1>Current Events Information:</h1>\n";

        // Displaying database information
        $sql = "SELECT * FROM Event";
        $result = $dbh->query($sql);
        $rows = $result->fetchall(PDO::FETCH_ASSOC);
        echo "<h3>" . 'There are total ' . count($rows) . ' records in Database' . "</h3>\n";

        $editTally = 0;
        foreach ($dbh->query($sql) as $row){
            ++$editTally;

            //single echo added for all html code
            echo "
            <form id='editRecord' name='editRecord$editTally' method='post' enctype='multipart/form-data' action='dbProcessEvent.php'>
            <h4><label>Record ID: $row[event_id]</label></h4>
            <input type='hidden' name='event_id' value='$row[event_id]' />
            <label>Event Name: </label><input type='text' name='event_title' value='$row[event_title]' />
            <label for='event_title'>Genre: </label>
            <label>Phone: </label><input type='text' name='event_phone' value='$row[event_phone]' />
            <label>Short Bio: </label><textarea type='text' name='event_shortBio' value='$row[event_shortBio]'>$row[event_shortBio]</textarea>
            <label>Long Bio: </label><textarea type='text' name='event_longBio' value='$row[event_longBio]'>$row[event_longBio]</textarea>
            <p>
            <label for='file'>Upload Icon/Logo:</label>
            <input type='file' name='iconfile' />
            <img src='$row[event_promoIcon]' width='100px'>
            </p>
            <p>
            <label for='file'>Upload Image:</label>
            <input type='file' name='imagefile'/>
            <img src='$row[event_promoPic]' width='100px'>
            </p>
            <input type='submit' name='submit' value='Update Information' class='updateButton' onClick='return validateEditForm($editTally);'/>
            <input type='submit' name='submit' value='Delete Entry' class='deleteButton' />
            <input type='submit' name='submit' value='X' class='deleteButton'/>
            </fieldset>
            </form>
            \n"
            //single echo ends here
            ;?>
        <?php
        }
        // closing database connection here
        $dbh = null;
        ?>
</div>
</body>
</html>