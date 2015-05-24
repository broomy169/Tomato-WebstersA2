<?php
// checking if session not started then start new session
if (!isset($_SESSION)){
    session_start();
}

    //connecting to database database
    //following code will make this file accessible from other directories as well
    isset($urlVar) || $urlVar = "";
    include($urlVar . "database_connect.php");

    //echo "<link rel='stylesheet' href= 'database/band_listStyle.css' type='text/css'>"; // now merged with styles.css
    echo "<script src= 'database/list_expandInfo.js' type='text/javascript'></script>";

    if (empty($_POST["genre"])) {
        $sql = "SELECT * FROM band";
    }

    if (!empty($_POST["genre"])) {
        // keeping each selected checkbox in session so after refresh checkboxes keep the selection state
        foreach ($_POST["genre"] as $checked){

                $_SESSION[$checked] = "checked";

        }

        $genres = $_POST["genre"];
        $genres = array_reverse($genres);
        $genresToString = implode(",", $genres);  // converting array tp string seperated by commas
        $sql = "SELECT * FROM Band WHERE band_genre IN (".$genresToString.");";
    }

    // counter or tally that helps to distinguish between each record's tags/click/input in JavaScript
    $blockTally = 1;

    //loop going through each band record and displays its info
    foreach($dbh->query($sql) as $row){

        // setting up and storing url links for icon and image
        $iconUrl = $urlVar . $row['band_promoIcon'];
        $imageUrl = $urlVar . $row['band_promoPic'];

        echo" 
            <!-- Start of single band List item-->
            <li>
                <div id='list$blockTally' class='bandClass box' onclick='expand($blockTally);' title='click here for more information' value='hide'>
                
                    <!-- Start of always show -->
                   
                    <div id='info-small$blockTally'>";
                        
                        //checking if image exists and display
        if (file_exists($iconUrl)){
            echo "
                        <div class='col w-1col m-1col float-Left'>
                            <div class='imgBox90'>
                                <img id='icon$blockTally' src='$iconUrl' alt='$row[band_name]' >
                            </div>
                        </div>";
        } 
        else {
            echo "
                        <div id='icon'>
                            <img src='database/images/defaultTomato.jpg'>
                        </div>";

        }
        echo" 

                        
                        <div class='col w-1col m-1col float-Right'>
                            <h3>Members</h3>";
        //need to pull band members from database and into an array and foreach into a list
        echo"
                            <ul>
                                <li>member1</li>
                                <li>member2</li>
                                <li>member3</li>
                            </ul>";
        
                            
       echo"            </div>
                        <!--<div class='col w-2col m-2col '>-->
                            <h2>$row[band_name]</h2>
                            <h4>$row[band_shortBio]</h4>
                        <!--</div>-->
                        
                        
                    </div>
                    
                    <!-- End of always show -->
                    
                    <!-- Start of expanded view -->
                    
                    <div id='info-more$blockTally' class='info-more'>";
                //checking and showing if image already added by user otherwise displaying default image
        if (file_exists($imageUrl)){
            echo "      <div class='col w-2col m-2col float-Right'>
                            <div class='imgBox90'>
                                <img id='photo$blockTally' src='$imageUrl' >
                            </div>
                        </div>";
        } 
        else {
            echo "      <div id='photo$blockTally' class='photo'>
                            <img id='photo$blockTally' src='database/images/defaultTomatoLight.jpg'>
                        </div>";
        }
                    
        echo "
                        <!--<div class='col w-2col m-2col '>-->
                            <h2>$row[band_name]</h2>
                            <h3>$row[band_shortBio]</h3><br>
                            <p>$row[band_longBio]</p>
                            <ul>";
        if(!((empty($row['band_phone'])) or ($row['band_phone'] == "none"))){
            echo"              <li><p>You can contact us on this phone number: $row[band_phone]</p></li>";
        }
        if(!((empty($row['band_email']))or ($row['band_email'] == "none"))){
            echo"              <li><p>or try email: <a href='mailto:$row[band_email]'>$row[band_email]</a></p></li>";
        }
        if(!((empty($row['band_website']))or ($row['band_website'] == "none"))){
            echo"              <li><p>while your at it you may as well checkout our Website: <a target='_blank' href=$row[band_website]>$row[band_website]</a></p></li>";
        }
        
        
        echo"
                                
                            </ul>
                        <!--</div>-->";

        echo "      </div>
                    <div id='clearBlock'>
                    </div>
                    
                    <!-- End of expanded view -->
                    
                </div>
            </li>
            
            <!-- End of single band List item-->";
        $blockTally++;
}?>