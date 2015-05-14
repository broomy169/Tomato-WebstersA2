<?php
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Band/Artists - TCMC</title>
    <link rel='stylesheet' href= 'band_manageListStyle.css' type='text/css'>
    <script src= 'band_validateAddForm.js' type='text/javascript'></script>
    <script src= 'band_validateEditForm.js' type='text/javascript'></script>
</head>
<body>
<div id="pageWrapper">
<h1>Sort by Genre</h1>
    <form id="band_sortGenre" name="band_sortGenre" method="post" action="band_sortGenre.php">
    <center><select name="band_sortGenre" id="band_sortGenre">
        <option value="Rock">Rock</option>
        <option value="Pop">Pop</option>
        <option value="Metal">Metal</option>
        <option value="Jazz">Jazz</option>
        <option value="Classical">Classical</option>
        <option value="Country">Country</option>
        <option value="Hip Hop">Hip Hop</option>
        <option value="Rap">Rap</option>
        </select></center>
        <center><input type="submit" name="submit" id="submit" value="Sort Genre"></center>
</form>
<h1>Manage (Add/remove/update) Band and Artists</h1>
<form id="addRecord" name="addRecord" method="post" enctype="multipart/form-data" action="band_databaseProcess.php">
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

        <p><label for="file">Upload Icon/Logo:</label><input type="file" name="iconfile" id="iconfile" value=""/><span class="error">*</span></p></p>
        <p><label for="file">Upload Image:</label><input type="file" name="imagefile" id="imagefile" value=""/><span class="error">*</span></p></p>

        <input type="submit" name="submit" id="submit" value="Add Entry" onClick="return validateAddForm();">
        <label><br/></label>
        <div id="box" title="Things to note">
        <label><p>Note:</p> </label>
        <p> - Individual upload for icon or photo not allowed. When adding or updating record, both photo and icon must be uploaded on same time. </p>
        </div>
    </fieldset>
</form>
    <?php
    echo "<fieldset>\n";
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
            <form id='editRecord' name='editRecord$editTally' method='post' enctype='multipart/form-data' action='band_databaseProcess.php'>
            <h4><label>Record ID: $row[band_id]</label></h4>
            <input type='hidden' name='band_id' value='$row[band_id]' />
            <label>Band/Artist Name: </label><input type='text' name='band_name' value='$row[band_name]' />
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
            <label>Phone: </label><input type='text' name='band_phone' value='$row[band_phone]' />
            <label>Email: </label><input type='text' name='band_email' value='$row[band_email]' />
            <label>Website: </label><input type='text' name='band_website' value='$row[band_website]' />
            <label>Short Bio: </label><textarea type='text' name='band_shortBio' value='$row[band_shortBio]'>$row[band_shortBio]</textarea>
            <label>Long Bio: </label><textarea type='text' name='band_longBio' value='$row[band_longBio]'>$row[band_longBio]</textarea>
            <p>
            <label for='file'>Upload Icon/Logo:</label>
            <input type='file' name='iconfile' />
            <img src='$row[band_promoIcon]' width='100px'>
            </p>
            <p>
            <label for='file'>Upload Image:</label>
            <input type='file' name='imagefile'/>
            <img src='$row[band_promoPic]' width='100px'>
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