<?php
    isset($urlVar) || $urlVar = "";
    include($urlVar . "database_connect.php");

    echo" 
		<script src='database/event_validateAddForm.js' type='text/javascript'></script>
        <div class='col'>
            <div class='col w-2col m-2col'>
                <h1>Add Events</h1>

                <form id='addEvent' name='addEvent' method='post' enctype='multipart/form-data' action='database/event_databaseProcess.php'>
                    <fieldset>
                        <h2>Add new Event record:</h2>
                        <span class='error'>* required fields</span></p>
                        <p><label for='event_title'>Event Name:- </label><input type='text' name='event_title' id='event_title' value=''><span class='error'>*</span></p>
                        <p><label for='event_phone'>Phone:- </label><input type='text' name='event_phone' id='event_phone' value=''><span class='error'>*</span></p>
                        <p><label for='event_date'>Date:- </label><input type='text' name='event_date' id='event_date' value='' placeholder='DD/MM/YYYY'><span class='error'>*</span></p>
                        <p><label for='event_venueName'>Venue Name:- </label><input type='text' name='event_venueName' id='event_venueName' value=''><span class='error'>*</span></p>
                        <p><label for='event_venueLocation'>Venue Location:- </label><input type='text' name='event_venueLocation' id='event_venueLocation' value=''><span class='error'>*</span></p>
                        <p><label for='event_shortBio'>Short Bio:- </label><textarea type='text' name='event_shortBio' id='event_shortBio'></textarea></p>
                        <p><label for='event_longBio'>Long Bio:- </label><textarea type='text' name='event_longBio' id='event_longBio'></textarea></p>
                        <p><label for='event_priceFull'>Price Full:- </label><input type='text' name='event_priceFull' id='event_priceFull' value=''><span class='error'>*</span></p>
                        <p><label for='event_priceConc'>Price Concession:- </label><input type='text' name='event_priceConc' id='event_priceConc' value=''><span class='error'>*</span></p>
                        <p><label for='file'>Upload Icon/Logo:</label><input type='file' name='iconfile' id='iconfile' value=''><span class='error'>*</span></p></p>
                        <p><label for='file'>Upload Image:</label><input type='file' name='imagefile' id='imagefile' value=''><span class='error'>*</span></p></p>
                        <input type='submit' name='submit' id='submit' value='Add Event' onClick='return eveValidateAddForm();'>
                        <div id='box' title='Things to note'>
                            <label><p>Note:</p> </label>
                            <p> - Individual upload for icon or photo not allowed. When adding record, both photo and icon must be uploaded on same time. </p>
                        </div>
                    </fieldset>
                </form>
            </div>
                        
            <div class='col w-2col m-2col'>
                <div class='formInfo'>
                    <h1>How To Guide</h1>
                    <h2>To <em>successfully</em> enter an event you will need to have entered a number of valid fields.</h2>
                    <h3>* = <em>required field</em></h3>
                    <ul>
                        <li>These fields are required to make it easier for your potential audience to connect with your event</li>
                        <li>Make sure you fill out the contact details correctly.</li>
                        <li>By entering as much info as possible about your event you will <strong>attract more punters</strong>.</li>
                        <li>Dont forget to <em>include,</em> images, <strong>both a large format and smaller format</strong> to promote your event, you will get little attention if you do not include the images.</li>
                        <li>Short Bio is for a quick description. i.e. 2 sentences maximum.</li>
                        <li>Long Bio is a great place to list past gigs, style and influences.</li>
                        <li>Upload both a an Icon(Think small image) and a larger image to grab peoples attention.</li>
                        <li>You can come back at any time and edit this info, however get as much info on as possible.</li>

                    </ul>
                </div>
            </div>


        </div>



    ";
?>
