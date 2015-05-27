<?php
isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

if (!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION['user_email'])){
    header("Location: index.php");
}
?>
            <div class='col w-2col m-2col'>
                <h1>Add Events</h1>

                <form id='addEvent' name='addEvent' method='post' enctype='multipart/form-data' action='database/event_databaseProcess.php'>
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

   	<?php
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
	  <div class='col w-2col m-2col'>    
		  <h1>Current Event Data/Information:</h1>
		  <form id='eventRecord' name='eventRecord$editTally' method='post' enctype='multipart/form-data' action='database/event_databaseProcess.php'>
			  <fieldset>
				  <h4><label>Record ID: $row[event_id]</label></h4>
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
				  <p><label for='file'>Icon/Logo:</label><img src='$iconUrl'></p>
				  <p><label for='file'>Image:</label><img src='$imageUrl'></p>
				  <input type='submit' name='submit' value='Update Information' class='updateButton'/>
				  <input type='submit' name='submit' value='Delete Entry' class='deleteButton' />
			  </fieldset>
		  </form>
	  </div>

	  ";
	  
    }
    // closing database connection here
    $dbh = null;

?>
