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
                <label for="name">Band/Artist Name:- </label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <label for="phone">Phone:- </label>
                <input type="text" name="phone" id="phone">
            </p>
            <p>
                <label for="email">Email:- </label>
                <input type="text" name="email" id="email">
            </p>
            <p>
                <label for="website">Website:- </label>
                <input type="text" name="website" id="website">
            </p>
            <p>
                <label for="shortbio">Short Bio:- </label>
                <textarea type="text" name="shortbio" id="shortbio"></textarea>
            </p>
            <p>
                <label for="longbio">Long Bio:- </label>
                <textarea type="text" name="longbio" id="longbio"></textarea>
            </p>
            <p>
                <label for="logophoto">Upload logo/Icon/small photo:- </label>
                <input type="file" name="logophoto" id="logophoto" >
            </p>
            <p>
                <label for="photos">Upload photo:- </label>
                <input type="file" name="photos" id="photos">
            </p>
            <p><input type="submit" name="submit" id="submit" value="Add Entry"></p>
    </fieldset>
</form>

    <fieldset>
        <h2>Current Band/Artists data/Information:</h2>
        <?php
        // Displaying database
        $sql = "SELECT * FROM band";
        foreach ($dbh->query($sql) as $row){
            ?>
            <form id="editRecord" name="editRecord" method="post" action="dbprocessband.php">
                <?php
                echo "<input type='hidden' name='id' value='$row[band_id]' />";
                echo "<label>Band/Artist Name: </label><input type='text' name='name' value='$row[band_name]' />
          <label>Phone: </label><input type='text' name='phone' value='$row[band_phone]' />
          <label>Email: </label><input type='text' name='email' value='$row[band_email]' />
          <label>Website: </label><input type='text' name='website' value='$row[band_website]' />
          <label>Short Bio: </label><input type='text' name='shortbio' value='$row[band_shortbio]' />
          <label>Long Bio: </label><input type='text' name='longbio' value='$row[band_longbio]' />
          <label>Upload logo/Icon/small photo: </label><input type='file' name='logophoto' value='$row[band_promo]' />
          <label>Upload Photo: </label><input type='file' name='photos' value='$row[band_promopic]' />

          \n";
                ?>
                <input type="submit" id="updateButton" name="submit" value="Update Information" />
                <input type="submit" name="submit" value="Delete Record" class="deleteButton">
                <input type="submit" name="submit" id="xButton" value="X" class="deleteButton">
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