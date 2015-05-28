<?php
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

if (!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION['user_email'])){
    header("Location: index.php");
}
	    //Displaying database information
    $loggedInUserID = $_SESSION['user_id'];

     //checking logged in user's access level and displaying information accordingly
        $sql = "SELECT * FROM Events ORDER BY event_date DESC";
       
  $result = $dbh->query($sql);
  $rows = $result->fetchall();
  $iconUrl = "icon";
  $imageUrl = "image";

   /* need to incase below in an if statement that is either 
   
	  user has no events;
		  "you have no previous editable events"
	  or
	  user has events
		  "you have X event to edit"
	  or
	  user is admin
		  "welcome admin you have X events to edit" 
		  
	  kurt...*/
			
	  if (count($rows) == 0) {
		  echo "<h3>You haven't added any Events yet.</h3>\n";
	  } else {
		  echo "<h3>" . 'There are total ' . count($rows) . ' events editable by you' . "</h3>\n";
	  }
	  
  $editTally = 0;
  foreach ($dbh->query($sql) as $row){
	  ++$editTally;

	  $iconUrl = $urlVar . $row['event_promoIcon'];
	  $imageUrl = $urlVar . $row['event_promoPic'];

	  //single echo added for all html code
	  echo "
	  <div class='col'>  
        <div class='manageList box'>
		  <h1>$row[event_title]</h1>
          <h2>$row[event_date]</h2>
		  <form id='eventRecord' name='eventRecord$editTally' method='post' enctype='multipart/form-data' action='database/event_databaseProcess.php'>
			  <fieldset>
				  <input type='hidden' name='event_id' value='$row[event_id]' >
				  <label>Event Name: </label><input type='text' name='event_title' value='$row[event_title]'>
				  <label>Event Date: </label><input type='text' name='event_date' value='$row[event_date]'>
				  <label>Phone: </label><input type='text' name='event_phone' value='$row[event_phone]'>
				  <label>Venue Name: </label><input type='text' name='event_venueName' value='$row[event_venueName]'>
				  <label>Venue Location: </label><input type='text' name='event_venueLocation' value='$row[event_venueLocation]'>
				  <label>Short Bio: </label><textarea type='text' name='event_shortBio' value='$row[event_shortBio]'>$row[event_shortBio]</textarea>
				  <label>Long Bio: </label><textarea type='text' name='event_longBio' value='$row[event_longBio]'>$row[event_longBio]</textarea>
				  <label>Price Full: </label><input type='text' name='event_priceFull' value='$row[event_priceFull]'>
				  <label>Price Concession: </label><input type='text' name='event_priceConc' value='$row[event_priceConc]'>
                    
                    <label for='file'>Upload Icon/Logo:</label>
                    <input type='file' name='iconfile' >
                    <img src='$iconUrl' alt='Event small image'>
                    <br>
                    <label for='file'>Upload Image:</label>
                    <input type='file' name='imagefile'>
                    <img src='$imageUrl'  alt='Event large image'>
                    <br>

                  
                  
				  <input type='submit' name='submit' value='Update Information' class='updateButton'>
				  <input type='submit' name='submit' value='Delete Entry' class='deleteButton' >
			  </fieldset>
		  </form>
        </div>
	  </div>

	  ";
      
  }

    // closing database connection here
    $dbh = null;

?>

