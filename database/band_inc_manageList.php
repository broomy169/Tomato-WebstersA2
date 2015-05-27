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
<script src='database/band_validateAddForm.js' type='text/javascript'></script>
<script src= 'database/band_validateEditForm.js' type='text/javascript'></script>
<div class='col w-2col m-2col'>
<h1>Manage (Add/remove/update) Band and Artists</h1>
<form id="addRecord" name="addRecord" method="post" enctype="multipart/form-data" action="database/band_inc_databaseProcess.php">
    <fieldset>
        <h2>Insert/Add new band/Artist record:</h2>
        <p><span class="error">* required field</span></p>
        <p><label for="band_name">Band/Artist Name:- </label><input type="text" name="band_name" id="band_name" value="">
        <span class="error">*</span></p>
        <p>
            <label for="band_genre">Genre:- </label>
            <select name="band_genre" id="band_genre">
                <option value="emptygenre">Please choose genre...</option>
                <option value="Rock">Rock</option>
                <option value="Pop">Pop</option>
                <option value="Metal">Metal</option>
                <option value="Jazz">Jazz</option>
                <option value="Classical">Classical</option>
                <option value="Country">Country</option>
                <option value="Hip Hop">Hip Hop</option>
                <option value="Rap">Rap</option>
            </select>
            <span class="error">*</span>
        </p>
        <p><label for="band_phone">Phone:- </label><input type="text" name="band_phone" id="band_phone" value="">
        <span class="error">*</span></p>
        <p><label for="band_email">Email:- </label><input type="text" name="band_email" id="band_email" value="">
        <span class="error">*</span></p>
        <p><label for="band_website">Website:- </label><input type="text" name="band_website" id="band_website"></p>
        <p><label for="band_shortBio">Short Bio:- </label><textarea type="text" name="band_shortBio" id="band_shortBio"></textarea></p>
        <p><label for="band_longBio">Long Bio:- </label><textarea type="text" name="band_longBio" id="band_longBio"></textarea></p>
        <p><label for="file">Upload Icon/Logo:</label><input type="file" name="iconfile" id="iconfile" value=""><span class="error">*</span></p>
        <p><label for="file">Upload Image:</label><input type="file" name="imagefile" id="imagefile" value=""><span class="error">*</span></p>
        <input type="submit" name="submit" id="submit" value="Add Entry" onClick="return validateAddForm();">
        <label><br></label>
        <div id="box" title="Things to note">
        <label><p>Note:</p> </label>
            <p> - Individual upload for icon or photo not allowed.</p>
            <p> When adding or updating record, both photo and icon must be uploaded on same time. </p>
        </div>
    </fieldset>
</form>
</div>

<div class='col w-2col m-2col'>
    <h1>need to add info on how to correctly fill out form here.</h1>
    <ul>
        <li>Tip #1</li>
        <li>Tip #2</li>
        <li>Tip #3</li>
        <li>Tip #4</li>
        <li>Tip #N</li>
    </ul>
</div>

<div class='clearBlock'>
</div>


    <?php
    

        echo "<h1>Current Band/Artists data/Information:</h1>\n";

        // Displaying database information

        $sql = "SELECT * FROM Band";
        $result = $dbh->query($sql);
        $rows = $result->fetchall(PDO::FETCH_ASSOC);
        echo "<h3>" . 'There are total ' . count($rows) . ' records in Database' . "</h3>\n";
        
        $editTally = 0;
        foreach ($dbh->query($sql) as $row){
            ++$editTally;

            //single echo added for all html code
            echo "
            <div class='col w-2col m-2col'>
            <form id='editRecord' name='editRecord$editTally' method='post' enctype='multipart/form-data'
            action='database/band_inc_databaseProcess.php'>
                <fieldset>
                    <h4><label>Record ID: $row[band_id]</label></h4>
                    <input type='hidden' name='band_id' value='$row[band_id]' >
                    <label>Band/Artist Name: </label><input type='text' name='band_name' value='$row[band_name]' >
                    <label for='band_genre'>Genre: </label>
                    <select name='band_genre' id='band_genre'>
                        <option>$row[band_genre]</option>
                        <option>Rock</option>
                        <option>Pop</option>
                        <option>Metal</option>
                        <option>Jazz</option>
                        <option>Classical</option>
                        <option>Country</option>
                        <option>Hip Hop</option>
                        <option>Rap</option>
                    </select>
                    <label>Phone: </label><input type='text' name='band_phone' value='$row[band_phone]' >
                    <label>Email: </label><input type='text' name='band_email' value='$row[band_email]' >
                    <label>Website: </label><input type='text' name='band_website' value='$row[band_website]' >
                    <label>Short Bio: </label><textarea type='text' name='band_shortBio' value='$row[band_shortBio]'>$row[band_shortBio]</textarea>
                    <label>Long Bio: </label><textarea type='text' name='band_longBio' value='$row[band_longBio]'>$row[band_longBio]</textarea>
                    <p>
                    <label for='file'>Upload Icon/Logo:</label>
                    <input type='file' name='iconfile' >
                    <img src='database/$row[band_promoIcon]' alt='Band small image'>
                    </p>
                    <p>
                    <label for='file'>Upload Image:</label>
                    <input type='file' name='imagefile'>
                    <img src='database/$row[band_promoPic]'  alt='Band large image'>
                    </p>
                    <input type='submit' name='submit' value='Update Information' class='updateButton' onClick='return validateEditForm();'>
                    <input type='submit' name='submit' value='Delete Entry' class='deleteButton' >
                </fieldset>
            </form>
            \n
            </div>"
                
                
            //single echo ends here
            ;?>
        <?php
        }
        // closing database connection here
        $dbh = null;
        ?>