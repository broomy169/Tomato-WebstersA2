<?php
isset($urlVar) || $urlVar = "";
include($urlVar."inc_dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Band/Artists - TCMC</title>
    <link rel='stylesheet' href= 'manageBandStylesheet.css' type='text/css'>
</head>

<body>
<div id="pageWrapper">
<h1>Manage (Add/remove/update) Band and Artists</h1>
<form id="addRecord" name="addRecord" method="post" enctype="multipart/form-data" action="dbprocessband.php">
    <fieldset>
        <h2>Insert/Add new band/Artist record:</h2>
        <p><label for="band_name">Band/Artist Name:- </label><input type="text" name="band_name" id="band_name"></p>
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
        </p>
        <p><label for="band_phone">Phone:- </label><input type="text" name="band_phone" id="band_phone"></p>
        <p><label for="band_email">Email:- </label><input type="text" name="band_email" id="band_email"></p>
        <p><label for="band_website">Website:- </label><input type="text" name="band_website" id="band_website"></p>
        <p><label for="band_shortBio">Short Bio:- </label><textarea type="text" name="band_shortBio" id="band_shortBio"></textarea></p>
        <p><label for="band_longBio">Long Bio:- </label><textarea type="text" name="band_longBio" id="band_longBio"></textarea></p>

        <!--  <form action="upload_file.php" method="post" enctype="multipart/form-data"> -->
        <p><label for="file">Upload Icon/Logo:</label><input type="file" name="iconfile" id="iconfile"/></p>
        <p><label for="file">Upload Image:</label><input type="file" name="imagefile" id="imagefile"/></p>

        <!-- </form> -->

        <input type="submit" name="submit" id="submit" value="Add Entry" >

        <label><br/></label>
        <div id="box" title="Things to note">
        <label><p>Note:</p> </label>
        <p> - It is recommended to upload both icon and Image on same time when adding or updating record.</p>
        <p> - Uploading image only will automatically generate smaller version of image and use it as icon or logo.</p>
        <p> - Uploading icon/logo only means you allowing tomato websters to use their logo or image.</p>
        </div>
    </fieldset>
</form>
    <fieldset>
        <h1>Current Band/Artists data/Information:</h1>
        <?php
        $record = 0;
        // Displaying database information
        $sql = "SELECT * FROM Band";
        $result = $dbh->query($sql);
        $rows = $result->fetchall(PDO::FETCH_ASSOC);
        echo "<h3>" . 'There are total ' . count($rows) . ' records in Database.</h3>';

        foreach ($dbh->query($sql) as $row){
            ?>
            <form id="editRecord" name="editRecord" method="post" enctype="multipart/form-data" action="dbprocessband.php">
                <?php
                echo "<h4><label>Record ID: $row[band_id]</label></h4>\n";
                echo "<input type='hidden' name='band_id' value='$row[band_id]' />";
                echo "<label>Band/Artist Name: </label><input type='text' name='band_name' value='$row[band_name]' />
                <label for='band_genre'>Genre: </label>
                <select name='band_genre' id='band_genre'>
                    <option>$row[band_genre]</option>
                    <option value='Rock'>Rock</option>
                    <option value='Pop'>Pop</option>
                    <option value='Metal'>Metal</option>
                    <option value='Jazz'>Jazz</option>
                    <option value='Classical'>Classical</option>
                    <option value='Country'>Country</option>
                    <option value='Hip Hop'>Hip Hop</option>
                    <option value='Rap'>Rap</option>
                 </select>
                <label>Phone: </label><input type='text' name='band_phone' value='$row[band_phone]' />
                <label>Email: </label><input type='text' name='band_email' value='$row[band_email]' />
                <label>Website: </label><input type='text' name='band_website' value='$row[band_website]' />
                <label>Short Bio: </label><textarea type='text' name='band_shortBio' value='$row[band_shortBio]'>$row[band_shortBio]</textarea>
                <label>Long Bio: </label><textarea type='text' name='band_longBio' value='$row[band_longBio]'>$row[band_longBio]</textarea>
                <p>
                <label for='file'>Upload Icon/Logo:</label>
                <input type='file' name='iconfile'/>
                <img src='$row[band_promoIcon]' width='100px'>
                </p>
                <p>
                <label for='file'>Upload Image:</label>
                <input type='file' name='imagefile' />
                <img src='$row[band_promoPic]' width='100px'>
                </p>

                \n";?>
                <input type="submit" name="submit" value="Update Information" class="updateButton"/>
                <input type="submit" name="submit" value="Delete Entry" class="deleteButton"/>
                <input type="submit" name="submit" value="X" class="deleteButton"/>
            </form>
        <?php
        }
        echo "</fieldset>\n";
        // closing database connection here
        $dbh = null;
        ?>
</div>
</body>
</html>