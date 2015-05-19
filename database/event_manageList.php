<?php
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

        $sql = "SELECT * FROM Events ORDER BY event_date DESC";
        $result = $dbh->query($sql);
        $rows = $result->fetchall();
        $iconUrl = "icon";
        $imageUrl = "image";

        
        foreach ($dbh->query($sql) as $row){
            
            $iconUrl = $urlVar . $row['event_promoIcon'];
            $imageUrl = $urlVar . $row['event_promoPic'];
        }
        

echo" 

        <div class='col w-2col m-2col'>
            <h1>Add Events</h1>
            
            <form id='addEvent' name='addEvent' method='post' enctype='multipart/form-data' action='"; echo "$urlVar"; echo"'event_databaseProcess.php'>
                <fieldset>
                    <h2>Add new Event record:</h2>
                    <span class='error'>* required fields</span></p>
                    <p><label for='event_title'>Event Name:- </label><input type='text' name='event_title' id='event_title' value=''><span class='error'>*</span></p>
                    <p><label for='event_phone'>Phone:- </label><input type='text' name='event_phone' id='event_phone' value=''><span class='error'>*</span></p>
                    <p><label for='event_date'>Date(dd/mm/yyyy):- </label><input type='text' name='event_date' id='event_date' value='dd/mm/yyyy'><span class='error'>*</span></p>
                    <p><label for='event_venueName'>Venue Name:- </label><input type='text' name='event_venueName' id='event_venueName' value=''><span class='error'>*</span></p>
                    <p><label for='event_venueLocation'>Venue Location:- </label><input type='text' name='event_venueLocation' id='event_venueLocation' value=''><span class='error'>*</span></p>
                    <p><label for='event_shortBio'>Short Bio:- </label><textarea type='text' name='event_shortBio' id='event_shortBio'></textarea></p>
                    <p><label for='event_longBio'>Long Bio:- </label><textarea type='text' name='event_longBio' id='event_longBio'></textarea></p>
                    <p><label for='event_priceFull'>Price Full:- </label><input type='text' name='event_priceFull' id='event_priceFull' value=''><span class='error'>*</span></p>
                    <p><label for='event_priceConc'>Price Concession:- </label><input type='text' name='event_priceConc' id='event_priceConc' value=''><span class='error'>*</span></p>
                    <p><label for='file'>Upload Icon/Logo:</label><input type='file' name='iconfile' id='iconfile' value=''><span class='error'>*</span></p></p>
                    <p><label for='file'>Upload Image:</label><input type='file' name='imagefile' id='imagefile' value=''><span class='error'>*</span></p></p>
                    <input type='submit' name='submit' id='submit' value='Add Event'>
                    <div id='box' title='Things to note'>
                        <label><p>Note:</p> </label>
                        <p> - Individual upload for icon or photo not allowed. When adding record, both photo and icon must be uploaded on same time. </p>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class='col w-2col m-2col'>
                <h1>helpfull hints </h1>
                
                <h2>To successfully enter an event you will need to have entered a number of valid fields. </h2>
                
                <p>
                    These fields are required to make it easier for your potential audience to connect with your event
                </p>
                <p>
                    By entering as much info as possible about your event you will attract more punters.
                </p>
                <p>
                    Dont forget to include images both a large format and smaller format to promote your event, you will get little attention if you do not include the images.
                </p>
                <img src='$imageUrl'>
                <p>
                    large image size will be scaled to XXX by XXX pixels
                </p>
                <img src='$iconUrl'>
                <p>
                    Icon image size will be scaled to XXX by XXX pixels
                </p>
                
                <p>
                    if you run into trouble please do not hesitate to <a href='mailto:admin@townsvillemusic.org'>email us.</a>
                </p>
                
                
            
        </div>
        
        

";



echo "
        <div class='col w-2col m-2col'>
            <h1>totals</h1>
            <h2>" . 'There are total of ' . count($rows) . ' records in Database' . "</h2>
        </div>";

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
