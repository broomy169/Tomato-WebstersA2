<?php
    isset($urlVar) || $urlVar = "";
    include($urlVar . "database_connect.php");

    $sql = "SELECT * FROM Events ORDER BY event_date DESC";
    $result = $dbh->query($sql);
    $rows = $result->fetchall();
    $iconUrl = "icon";
    $imageUrl = "image";




    echo "
        <h1>User Events</h1>
        <h2>" . 'There are total of ' . count($rows) . ' Events editable by you' . "</h2>
        <p>Please make your changes in the relevent event</p>
    ";

    $editTally = 0;
    foreach ($dbh->query($sql) as $row){
        ++$editTally;

        $iconUrl = $urlVar . $row['event_promoIcon'];
        $imageUrl = $urlVar . $row['event_promoPic'];

        //single echo added for all html code
        echo "
        <div class='col w-2col m-2col'>    
            <h1>Current Event Data/Information:</h1>
            <form id='eventRecord' name='eventRecord$editTally' method='post' enctype='multipart/form-data' action='"; echo "$urlVar"; echo"'event_databaseProcess.php'>
                <fieldset>
                    <h4><label>Record ID: $row[event_id]</label></h4>
                    <input type='hidden' name='event_id' value='$row[event_id]' >
                    <label>Event Name: </label><input type='text' name='event_title' value='$row[event_title]' readonly>
                    <label>Event Date: </label><input type='text' name='event_date' value='$row[event_date]' readonly>
                    <label>Phone: </label><input type='text' name='event_phone' value='$row[event_phone]' readonly>
                    <label>Venue Name: </label><input type='text' name='event_venueName' value='$row[event_venueName]' readonly>
                    <label>Venue Location: </label><input type='text' name='event_venueLocation' value='$row[event_venueLocation]' readonly>
                    <label>Short Bio: </label><textarea type='text' name='event_shortBio' value='$row[event_shortBio]' readonly>$row[event_shortBio]</textarea>
                    <label>Long Bio: </label><textarea type='text' name='event_longBio' value='$row[event_longBio]' readonly>$row[event_longBio]</textarea>
                    <label>Price Full: </label><input type='text' name='event_priceFull' value='$row[event_priceFull]' readonly>
                    <label>Price Concession: </label><input type='text' name='event_priceConc' value='$row[event_priceConc]' readonly>
                    <p>
                        <label for='file'>Icon/Logo:</label>
                        <img src='$iconUrl'>
                    </p>
                    <p>
                        <label for='file'>Image:</label>
                        <img src='$imageUrl'>
                    </p>
                </fieldset>
            </form>
        </div>

        ";

    }
    // closing database connection here
    $dbh = null;

?>
