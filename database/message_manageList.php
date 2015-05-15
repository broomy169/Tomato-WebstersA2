<?php
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Messages - TCMC</title>
    <link rel='stylesheet' href= 'band_manageListStyle.css' type='text/css'>
    <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var today = dd+'/'+mm+'/'+yyyy;
    document.getElementById("messageCreateDate").value = today;
    </script>
</head>
<body>
<div id="pageWrapper">
<h1>Manage Messages</h1>
<form id="addMessage" name="addMessage" method="post" enctype="multipart/form-data" action="message_databaseProcess.php">
    <fieldset>
        <h2>Add new Message record:</h2>
        <p><span class="error">* required field</span></p><span class="error">*</span>
        <input type="hidden" name="message_createDate" id="message_createDate" value="">
        <p><label for="message_expiraryDate">Message Date:- </label><input type="text" name="message_expiraryDate" id="message_expiraryDate" value="">     
        <p><label for="message_title">Title:- </label><input type="text" name="message_title" id="message_title" value="">
        <p><label for="message_content">Message:- </label><textarea type="text" name="message_content" id="message_content" value=""></textarea>
        <p><label for="message_link">Link:- </label><input type="text" name="message_link" id="message_link" value=""></p>
        <p><label for="message_linkTitle">Link Title(Optional):- </label><input type="text" name="message_linkTitle" id="message_linkTitle" value=""></input></p>
        <input type="submit" name="submit" id="submit" value="Add Message">
        <label><br/></label>
    </fieldset>
</form>
    <?php
    echo "<fieldset>\n";
    echo "<h1>Current Messages:</h1>\n";

        // Displaying database information
        $sql = "SELECT * FROM Message";
        $result = $dbh->query($sql);
        $rows = $result->fetchall(PDO::FETCH_ASSOC);
        echo "<h3>" . 'There are total ' . count($rows) . ' records in Database' . "</h3>\n";

        $editTally = 0;
        foreach ($dbh->query($sql) as $row){
            ++$editTally;

            //single echo added for all html code
            echo "
            <form id='viewMessage' name='viewMessage$editTally' method='post' enctype='multipart/form-data' action='message_databaseProcess.php'>
            <h4><label>Record ID: $row[band_id]</label></h4>
            <input type='hidden' name='band_id' value='$row[band_id]' />
            <label>Band/Artist Name: </label><input type='text' name='band_name' value='$row[band_name]' />
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