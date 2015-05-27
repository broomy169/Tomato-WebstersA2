<?php
if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['user_email'])){
    header("Location: ../index.php");
}

if ($_SESSION['user_accessLevel'] != "full"){
    $_SESSION['no_access_msg'] = "You thrown back to home page because you tried to access unauthorised page.";
    header("Location: ../index.php");
}

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");
?>

    <h1>Manage Users</h1>
    <script src= 'database/list_expandInfo.js' type='text/javascript'></script>
    <?php

    // Displaying database information
    $sql = "SELECT * FROM Users";
    $result = $dbh->query($sql);
    $rows = $result->fetchall(PDO::FETCH_ASSOC);
    echo "<h3>" . 'Total ' . count($rows) . ' members in Database' . "</h3>\n";

    $tally = 0;
    foreach ($dbh->query($sql) as $row){
        ++$tally;

        //single echo added for all html code

        echo "
        <form id='editRecord$tally' name='editRecord$tally' method='post' enctype='multipart/form-data' action='database/users_databaseProcess.php'>
            <fieldset>
                <input type='hidden' name='user_id' value='$row[user_id]' >
                <label>User First Name: </label><input id='userFname' type='text' name='user_firstName' value='$row[user_firstName]'>
                <label>User Last Name: </label><input id='userLname' type='text' name='user_lastName' value='$row[user_lastName]'>
                <label>Phone: </label><input type='text' name='user_phone' value='$row[user_phone]' >
                <label>After Hours Phone: </label><input type='text' name='user_phoneAfterHours' value='$row[user_phoneAfterHours]' >
                <label>Mobile: </label><input type='text' name='user_mobile' value='$row[user_mobile]' >
                <label>Email: </label><input type='text' name='user_email' value='$row[user_email]' >
                <label>Password: </label><input type='text' name='user_password' value='$row[user_password]' >
                <label>Access Level: </label><input type='text' name='user_accessLevel' value='$row[user_accessLevel]'>
                <label>Address: </label><textarea type='text' name='user_address' value='$row[user_address]'>$row[user_address]</textarea>
                <input type='submit' name='submit' value='Update Information' class='updateButton' onClick='return validateEditForm($tally);'>
                <input type='submit' name='submit' value='Delete Entry' class='deleteButton' >
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