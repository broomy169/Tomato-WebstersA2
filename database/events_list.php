<?php
    //including connection code for database
    //following code will make this file accessible from other directories as well
    isset($urlVar) || $urlVar = "";
    include($urlVar . "database_connect.php");

    //echo "<link rel='stylesheet' href= 'database/event_listStyle.css' type='text/css'>"; // now merged with styles.css
    echo "<script src= 'database/list_expandInfo.js' type='text/javascript'></script>";

    $sql = "SELECT * FROM events";
    // counter or tally that helps to distinguish between each record's tags/click/input in JavaScript
    $blockTally = 1;
    
    $dbReturn = $dbh->query($sql);


    //loop going through each event record and displays its info
    foreach($dbh->query($sql) as $row){

        // setting up and storing url links for icon and image
        $iconUrl = $urlVar . $row['event_promoIcon'];
        $imageUrl = $urlVar . $row['event_promoPic'];

        echo" 
            <!-- Start of single event List item-->
            <li>
                <div id='list$blockTally' class='eventClass box' onclick='expand($blockTally);' title='click here for more information' value='hide'>
                
                    <!-- Start of always show -->
                   
                    <div id='info-small$blockTally'>
        ";
                        
                        //checking if image exists and display
        if (file_exists($iconUrl)){
            echo "
                        <div class='col w-1col m-1col float-Left'>
                            <div class='imgBox90'>
                                <img id='icon$blockTally' src='$iconUrl' alt='$row[event_title]'>
                            </div>
                        </div>
            ";
        } 
        else {
            echo "
                        <div class='col w-1col m-1col float-Left'>
                            <div class='imgBox90'>
                                <img id='icon$blockTally'src='database/images/defaultTomato.jpg' alt='$row[event_title]'>
                            </div>
                        </div>
        ";

        }
        echo" 

                        
                        <div class='col w-1col m-1col float-Right'>
                            <h3>$row[event_date]</h3>
        ";
        //need to pull event venue details from database 
        echo"
                            <ul>";
        if(!(empty($row['event_venueName']))){
            echo"              
                                <li><p>Venue: $row[event_venueName]</p></li>
            ";
        }
        else{
            echo"              
                                <li><p>Venue: Not Entered</p></li>
            ";
        }
                                
        if(!(empty($row['event_venueLocation']))){
            echo"              
                                <li><p>Location: $row[event_venueLocation]</p></li>
            ";
        }
        else{
            echo"              
                                <li><p>Location: Not Entered</p></li>
            ";
        }
                                
        if(!(empty($row['event_priceFull']))){
            echo"              
                                <li><p>Full Price: $row[event_priceFull]</p></li>
            ";
        }
        else{
            echo"              
                                <li><p>Full Price: Not Entered</p></li>
            ";
        }
        echo"               </ul>
        ";
        
                            
       echo"            
                        </div>
                        
                        <!--<div class='col w-2col m-2col '>-->
                            <h2>$row[event_title]</h2>
                            <h4>$row[event_shortBio]</h4>
                        <!--</div>-->
                        
                        
                    </div>
                    
                    <!-- End of always show -->
                    
                    <!-- Start of expanded view -->
                    
                    <div id='info-more$blockTally' class='info-more'>
        ";
                //checking and showing if image already added by user otherwise displaying default image
        if (file_exists($imageUrl)){
            echo "      
                        <div class='col w-2col m-2col float-Right'>
                            <div class='imgBox90'>
                                <img id='photo$blockTally' src='$imageUrl' alt='$row[event_title]'>
                            </div>
                        </div>
            ";
        } 
        else {
            echo "      
                        <div id='photo$blockTally' class='photo'>
                            <img id='photo$blockTally' src='database/images/defaultTomatoLight.jpg' alt='photo'>
                        </div>
            ";
        }
                    
        echo "
                        
                        <h2>$row[event_title]</h2>
                        <h3>$row[event_shortBio]</h3><br>
                        <p>$row[event_longBio]</p>
                            
                        <div class='col w-2col m-2col '>
                            <ul>
        ";
        
        

        
        if(!((empty($row['event_phone'])) or ($row['event_phone'] == "none"))){
            echo"              
                                <li><p>You can contact us on this phone number: $row[event_phone]</p></li>
            ";
        }
        if(!((empty($row['event_email']))or ($row['event_email'] == "none"))){
            echo"              
                                <li><p>or try email: <a href='mailto:$row[event_email]'>$row[event_email]</a></p></li>
            ";
        }
        if(!((empty($row['event_website']))or ($row['event_website'] == "none"))){
            echo"              
                                <li><p>while your at it you may as well checkout our Website: <a target='_blank' href=$row[event_website]>$row[event_website]</a></p></li>
            ";
        }
        
        
        echo"
                                
                            </ul>
                        </div>
        ";
        
        
        echo" 
        
                        <div class='col w-2col m-2col '>
                            <h3>Scheduled event date: $row[event_date]</h3>
        ";
        //need to pull event venue details from database 
        echo"
                            <ul>
        ";
        
        if(!(empty($row['event_venueName']))){
            echo"              
                                <li><p>Venue: $row[event_venueName]</p></li>
            ";
        }
        else{
            echo"              
                                <li><p>Venue: Not Entered</p></li>
            ";
        }
                                
        if(!(empty($row['event_venueLocation']))){
            echo"              
                                <li><p>Location: $row[event_venueLocation]</p></li>
            ";
        }
        else{
            echo"              
                                <li><p>Location: Not Entered</p></li>
            ";
        }
                                
        if(!(empty($row['event_priceFull']))){
            echo"              
                                <li><p>Full Price: $row[event_priceFull]</p></li>
            ";
        }
        else{
            echo"              
                                <li><p>Full Price: Not Entered</p></li>
            ";
        }
        if(!(empty($row['event_priceConc']))){
            echo"              
                                <li><p>Concession Price: $row[event_priceConc]</p></li>
            ";
        }
        else{
            echo"              
                                <li><p>Concession Price: Not Entered</p></li>
            ";
        }

        echo"               
                            </ul>
                            ";
        
                            
       echo"               
                        </div>
                        ";
        

        echo "      
                    </div>
                    <div class='clearBlock'>
                    </div>
                    
                    <!-- End of expanded view -->
                    
                </div>
            </li>
            
            <!-- End of single event List item-->
        ";
        $blockTally++;
}?>
