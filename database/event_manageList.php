<?php
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");


echo"
    <div id='pageWrapper'>
        <h1>Add Events</h1>
        <form id='addEvent' name='addEvent' method='post' enctype='multipart/form-data' action='";echo"$urlVar";echo"event_databaseProcess.php'>
            <fieldset>
                <h2>Add new Event record:</h2>
                <span class='error'>* required fields</span></p>
                <p><label for='event_title'>Event Name:- </label><input type='text' name='event_title' id='event_title' value=''/><span class='error'>*</span></p>
                <p><label for='event_phone'>Phone:- </label><input type='text' name='event_phone' id='event_phone' value=''/><span class='error'>*</span></p>
                <p><label for='event_date'>Date(dd/mm/yyyy):- </label><input type='text' name='event_date' id='event_date' value=''/><span class='error'>*</span></p>
                <p><label for='event_shortBio'>Short Bio:- </label><textarea type='text' name='event_shortBio' id='event_shortBio'/></textarea></p>
                <p><label for='event_longBio'>Long Bio:- </label><textarea type='text' name='event_longBio' id='event_longBio'/></textarea></p>
                <p><label for='file'>Upload Icon/Logo:</label><input type='file' name='iconfile' id='iconfile' value=''/><span class='error'>*</span></p></p>
                <p><label for='file'>Upload Image:</label><input type='file' name='imagefile' id='imagefile' value=''/><span class='error'>*</span></p></p>
                <input type='submit' name='submit' id='submit' value='Add Event'>
                <div id='box' title='Things to note'>
                <label><p>Note:</p> </label>
                <p> - Individual upload for icon or photo not allowed. When adding record, both photo and icon must be uploaded on same time. </p>
                </div>
            </fieldset>
        </form>
";
    
    echo "<fieldset>\n";
    echo "<h1>Current Event data/Information:</h1>\n";

        $sql = "SELECT * FROM Events";
        $result = $dbh->query($sql);
        $rows = $result->fetchall(PDO::FETCH_ASSOC);
        echo "<h3>" . 'There are total of ' . count($rows) . ' records in Database' . "</h3>\n";

        $editTally = 0;
        foreach ($dbh->query($sql) as $row){
            ++$editTally;

            //single echo added for all html code
            echo "
            <form id='eventRecord' name='eventRecord$editTally' method='post' enctype='multipart/form-data' action='";echo"$urlVar";echo"event_databaseProcess.php'>
            <h4><label>Record ID: $row[event_id]</label></h4>
            <input type='hidden' name='event_id' value='$row[event_id]' />
            <label>Event Name: </label><input type='text' name='event_title' value='$row[event_title]' readonly/>
			<label>Event Name: </label><input type='text' name='event_date' value='$row[event_title]' readonly/>
            <label>Phone: </label><input type='text' name='event_phone' value='$row[event_phone]' readonly/>
            <label>Short Bio: </label><textarea type='text' name='event_shortBio' value='$row[event_shortBio]' readonly>$row[event_shortBio]</textarea>
            <label>Long Bio: </label><textarea type='text' name='event_longBio' value='$row[event_longBio]' readonly>$row[event_longBio]</textarea>
            <p>
            <label for='file'>Icon/Logo:</label>
            <img src='$row[event_promoIcon]' width='100px'>
            </p>
            <p>
            <label for='file'>Image:</label>
            <img src='$row[event_promoPic]' width='100px'>
            </p>
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
