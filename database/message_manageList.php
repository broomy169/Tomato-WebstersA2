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
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Messages - TCMC</title>
    <link rel='stylesheet' href= 'band_manageListStyle.css' type='text/css'>
    <script src="currentDate.js" type="text/javascript" ></script>
</head>
<body>
<div id="pageWrapper">
<h1>Manage Messages</h1>
		<?php
		date_default_timezone_set('Australia/Brisbane');
        $date = date('d/m/y', time());
		?>
<form id="addMessage" name="addMessage" method="post" enctype="multipart/form-data" action="message_databaseProcess.php">
    <fieldset>
        <h2>Add new Message record:</h2>
        <input type="hidden" name="message_createDate" id="message_createDate" value="<?php echo"$date";?>">
        <p><label for="message_expDate">Message Expiry Date:- </label><input type="text" name="message_expDate" id="message_expDate" value="">     
        <p><label for="message_title">Title:- </label><input type="text" name="message_title" id="message_title" value="">
        <p><label for="message_content">Message:- </label><textarea type="text" name="message_content" id="message_content" value=""></textarea>
        <p><label for="message_link">Link:- </label><input type="text" name="message_link" id="message_link" value=""></p>
        <p><label for="message_linkTitle">Link Title(Optional):- </label><input type="text" name="message_linkTitle" id="message_linkTitle" value=""></input></p>
        <input type="submit" name="submit" id="submit" value="Add Message" onClick="return autoDate()">
        <label><br/></label>
    </fieldset>
</form>
    <?php
    echo "<fieldset>\n";
    echo "<h1>Current Messages:</h1>\n";

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
            <form id='viewMessage' name='viewMessage$editTally' method='post' enctype='multipart/form-data' action='message_databaseProcess.php'>
            <h4><label>Record ID: $row[message_id]</label></h4><input type='hidden' name='message_id' value='$row[message_id]' />
            <h4><label>Create Date:</label></h4><input type='text' name='message_createDate' value='$row[message_createDate]' readonly/>
            <h4><label>Expiry Date:</label></h4><input type='text' name='message_expDate' value='$row[message_expDate]' readonly/>
            <h4><label>Title:</label></h4><input type='text' name='message_title' value='$row[message_title]' readonly/>
            <h4><label>Content:</label></h4><input type='text' name='message_content' value='$row[message_content]' readonly/>
            <h4><label>Link:</label></h4><input type='text' name='message_link' value='$row[message_link]' readonly/>
            <h4><label>Link Title(Optional):</label></h4><input type='text' name='message_linkTitle' value='$row[message_linkTitle]' readonly/>
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