<?php
    //including connection code for database
    //following code will make this file accessible from other directories as well
    isset($urlVar) || $urlVar = "";
    include($urlVar . "database_connect.php");

    echo "<link rel='stylesheet' href= 'database/band_listStyle.css' type='text/css'>";
    echo "<script src= 'database/band_expandInfo.js' type='text/javascript'></script>";

    $sql = "SELECT * FROM band";
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
                <div id='band$blockTally' class='bandClass' onclick='expand($blockTally);' title='click here for more information' value='hide'>
                
                    <!-- Start of always show -->
                    
                    <div id='info'>
                        <h2>$row[band_name]</h2>
                        <h3>$row[band_shortBio]</h3>";
                        
                        //checking if image exists and display
        if (file_exists($iconUrl)){
            echo "      <div id='icon'>
                            <img src='$iconUrl'>
                        </div>";
        } 
        else {
            echo "      <div id='icon'>
                            <img src='database/images/defaultTomato.jpg'>
                        </div>";

        }
         echo"           
                    </div>
                    
                    <!-- End of always show -->
                    <!-- Start of expanded view -->
                    
                    <div id='moreInfo$blockTally' class='moreInfo'>
                        <p>$row[band_longBio]</p>
                        <ul>
                            <li><p>'contact us on this phone number'>Phone: $row[band_phone]</p></li>
                            <li><p>'click here to email us'>Email: <a href='mailto:$row[band_email]'>$row[band_email]</a></p></li>
                            <li><p>'click here to go to our website'>Website: <a target='_blank' href=$row[band_website]>$row[band_website]</a></p></li>
                        </ul>";


        //checking and showing if image already added by user otherwise displaying default image
        if (file_exists($imageUrl)){
            echo "      <div id='photo$blockTally' class='photo'>
                            <img src='$imageUrl'>
                        </div>";
        } 
        else {
            echo "      <div id='photo$blockTally' class='photo'>
                            <img src='database/images/defaultTomatoLight.jpg'>
                        </div>";
        }

        echo "      </div>
                    <div id='clearBlock'><li>
                    </div>
                    
                    <!-- End of expanded view -->
                    
                </div>
            </li>
            
            <!-- End of single band List item-->";
        $blockTally++;
}?>

