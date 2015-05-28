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
<script src="database/message_validateAddForm.js" type="text/javascript"></script>
<div class='col w-2col m-2col'>
<h1>Add Messages</h1>
		<?php
		date_default_timezone_set('Australia/Brisbane');
        $date = date('d/m/y', time());
		?>
<form id="addMessage" name="addMessage" method="post" enctype="multipart/form-data" action="database/message_databaseProcess.php">
    <fieldset>
        <h2>Add new Message record:</h2>
        <input type="hidden" name="message_createDate" id="message_createDate" value="<?php echo"$date";?>">
        <p><label for="message_expDate">Expiry Date:- </label><input type="text" name="message_expDate" id="message_expDate" placeholder="DD/MM/YYYY" value=""><span class="error">*</span>
        <p><label for="message_title">Title:- </label><input type="text" name="message_title" id="message_title" value=""><span class="error">*</span>
        <p><label for="message_content">Message:- </label><textarea type="text" name="message_content" id="message_content" value=""></textarea>
        <p><label for="message_link">Link:- </label><input type="text" name="message_link" id="message_link" value=""><span class="error">*</span></p>
        <p><label for="message_linkTitle">Link Title(Optional):- </label><input type="text" name="message_linkTitle" id="message_linkTitle" value=""></p>
        <input type="submit" name="submit" id="submit" value="Add Message" onClick="return msgValidateAddForm()">
        <label><br></label>
    </fieldset>
</form>
</div>

<div class='col w-2col m-2col'>
    <div class="formInfo">
        <h1>How To Guide</h1>
        <h2>Please read the tips below to help you complete the form.</h2>
        <h3>* = <em>required field</em></h3>
        <ul>
            <li>Try to be as descriptive as possible.</li>
            <li>Make sure you fill out the contact details correctly. You cant be booked for a gig if you cant be contacted. </li>
            <li>Date is to be added as "dd/mm/yyy" i.e. 15/06/2015</li>
            <li>Add your unformatted external link if you like.</li>
            <li>You can come back at any time and edit this info, however get as much info on as possible.</li>
        </ul>
    </div>
</div>

    <?php
    

    

     //Displaying database information
    $loggedInUserID = $_SESSION['user_id'];

     //checking logged in user's access level and displaying information accordingly
    if ($_SESSION['user_accessLevel'] == "full" || $_SESSION['user_accessLevel'] == "paid"){
        $sql = "SELECT * FROM Message";
        

     //displaying messages that are only created by logged in user
    } else if ($_SESSION['user_accessLevel'] == "free") {
        $sql = "SELECT * FROM Message WHERE Message.user_id = $loggedInUserID";
    }
        $result = $dbh->query($sql);
        $rows = $result->fetchall(PDO::FETCH_ASSOC);

        echo "<h1>Current Messages:</h1>\n";
        if (count($rows) == 0) {
            echo "<h3>You haven't added any message yet.</h3>\n";
        } else {
            echo "<h3>" . 'There are total ' . count($rows) . ' records in Database' . "</h3>\n";
        }

        $editTally = 0;
        foreach ($dbh->query($sql) as $row){
            ++$editTally;
            


            //single echo added for all html code
            echo "
            <div class='col'>
                <div class='manageList'>
                    <form id='viewMessage' name='viewMessage$editTally' method='post' enctype='multipart/form-data' action='database/message_databaseProcess.php'>
                        <fieldset>
                            <h4>$row[message_title] by Insert message creator here!!!</h4><input type='hidden' name='message_id' value='$row[message_id]' >
                            <label>Create Date:</label><input type='text' name='message_createDate' value='$row[message_createDate]' readonly>
                            <label>Expiry Date:</label><input type='text' name='message_expDate' value='$row[message_expDate]'>
                            <label>Title:</label><input type='text' name='message_title' value='$row[message_title]'>
                            <label>Content:</label><input type='textbox' name='message_content' value='$row[message_content]'>
                            <label>Link:</label><input type='text' name='message_link' value='$row[message_link]'>
                            <label>Link Title(Optional):</label><input type='text' name='message_linkTitle' value='$row[message_linkTitle]'>
                            <input type='submit' name='submit' value='Update Information' class='updateButton'>
                            <input type='submit' name='submit' value='Delete Entry' class='deleteButton' >
                        </fieldset>
                    </form>
                \n
                </div>
            </div>
            ";
            

            //single echo ends here
            ?>
        <?php
        }
        // closing database connection here
        $dbh = null;
        ?>