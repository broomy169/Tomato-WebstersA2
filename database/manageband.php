<?php
    include("inc_dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Band/Artists - TCMC</title>
</head>
<style type="text/css">
    fieldset {width: 100%; border: none; align-content: center;}
    .deleteButton {
        color: #000000;
        background-color: #ff8280;
    }
    .deleteButton:hover {background-color: #ff0006; color: #ffffff;}
    #updateButton {background-color: #96e9cb; color: #ffffff;}
    #updateButton:hover {background-color: #d2ff81; color: #000;}
    #pageWrapper{margin: 0 auto; width: 80%;}
    #addRecord {border: #26be19 ridge 20px; }
    p{display: table-row; margin: 2px; padding: 2px;}
    label{display: table-cell; text-align: right; margin: 2px; padding: 2px;}
    input{display: table-cell; margin: 2px; padding: 2px; width: 300px; align-content: center;}
    textarea{display: table-cell; margin: 2px; padding: 2px; width: 350px;}
    #submit {text-align: center;}
    #submit:hover {font-weight: bolder;}
    h2 {text-align: center;}
    #editRecord{border: #09ceff outset 10px; margin: 5px; padding: 10px;}
</style>
<script>


</script>


<body>
<div id="pageWrapper">
<h1>Manage (Add/remove/update) Band and Artists</h1>
<form id="addRecord" name="addRecord" method="post" action="dbprocessband.php">
    <fieldset>
        <h2>Insert/Add new band/Artist record:</h2>
            <p>
                <label for="band_name">Band/Artist Name:- </label>
                <input type="text" name="band_name" id="band_name">
            </p>
            <p>
                <label for="band_phone">Phone:- </label>
                <input type="text" name="band_phone" id="band_phone">
            </p>
            <p>
                <label for="band_email">Email:- </label>
                <input type="text" name="band_email" id="band_email">
            </p>
            <p>
                <label for="band_website">Website:- </label>
                <input type="text" name="band_website" id="band_website">
            </p>
            <p>
                <label for="band_shortbio">Short Bio:- </label>
                <textarea type="text" name="band_shortbio" id="band_shortbio"></textarea>
            </p>
            <p>
                <label for="band_longbio">Long Bio:- </label>
                <textarea type="text" name="band_longbio" id="band_longbio"></textarea>
            </p>
            <p>
                <label for="band_promoicon">Upload logo/Icon/small photo:- </label>
                <input type="file" name="band_promoicon" id="band_promoicon" >
            </p>
            <p>
                <label for="band_promoicon">Upload photo:- </label>
                <input type="file" name="band_promopic" id="band_promopic">
            </p>
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
                    <option value="Hiphop">Hip Hop</option>
                    <option value="Rap">Rap</option>
                </select>
            </p>
            <p><input type="submit" name="submit" id="submit" value="Add Entry"></p>
    </fieldset>
</form>

    <fieldset>
        <h2>Current Band/Artists data/Information:</h2>
        <?php
        // Displaying database
        $sql = "SELECT * FROM Band";
        foreach ($dbh->query($sql) as $row){
            ?>
            <form id="editRecord" name="editRecord" method="post" action="dbprocessband.php">
                <?php
                echo "<input type='hidden' name='band_id' value='$row[band_id]' />";
                echo "<label>Band/Artist Name: </label><input type='text' name='band_name' value='$row[band_name]' />
          <label>Phone: </label><input type='text' name='band_phone' value='$row[band_phone]' />
          <label>Email: </label><input type='text' name='band_email' value='$row[band_email]' />
          <label>Website: </label><input type='text' name='band_website' value='$row[band_website]' />
          <label>Short Bio: </label><input type='text' name='band_shortbio' value='$row[band_shortbio]' />
          <label>Long Bio: </label><input type='text' name='band_longbio' value='$row[band_longbio]' />
          <label>Upload Promo Icon: </label><input type='file' name='band_logophoto' value='$row[band_promoicon]' />
          <label>Upload Promo Pic: </label><input type='file' name='band_photos' value='$row[band_promopic]' />

          \n";
                ?>
                <input type="submit" name="submit" value="Update Information" />
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