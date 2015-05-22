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

    $sql = "SELECT * FROM Message";
    // counter or tally that helps to distinguish between each record's tags/click/input in JavaScript
    $blockTally = 1;

    //loop going through each message record and displays its info
    foreach($dbh->query($sql) as $row){


        echo" 
            <!-- Start of single message List item-->
            <li>
                <div id='list$blockTally' class='bandClass box' onclick='expand($blockTally);' title='click here for more information' value='hide'>
                
                    <!-- Start of always show -->
                   
                    <div id='info-small$blockTally'>";
					    
        //need to pull band members from database and into an array and foreach into a list
                
                            
       echo"            
                        <!--<div class='col w-2col m-2col '>-->
                            <h2>$row[message_title]</h2>
                        <!--</div>-->
                        
                        
                    </div>
                    
                    <!-- End of always show -->
                    
                    <!-- Start of expanded view -->
                    
                    <div id='info-more$blockTally' class='info-more'>";
					                   
        echo "
                        <!--<div class='col w-2col m-2col '>-->
							<p>Create Date: $row[message_createDate]<br>
							Expiry Date: $row[message_expDate]</p>
                            <p>$row[message_content]</p>
                            <ul>";
							
        if(!((empty($row['event_phone'])) or ($row['event_phone'] == "none"))){
            echo"              <li><p>You can contact us on this phone number: $row[event_phone]</p></li>";
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