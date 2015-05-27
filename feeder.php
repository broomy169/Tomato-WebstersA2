<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
#require_once('../simplepie.inc');
// For 1.3+:
require_once('php/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie('http://www.eventfinda.com.au/feed/events/townsville/whatson/upcoming.rss');
 
// Set the feed to process.
//$feed->set_feed_url
 //
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Townville Community Music Centre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS links -->
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="header">
        <div class="navigation">
            <div class="float-Left">
                <img src="database/images/SiteImages/TCMC98Neg.gif" alt="TCMC Logo">
            </div>
            <ul>
                <li><a href="index.php">Home</a>
                </li>
                <li><a href="bands.php">bands</a>
                </li>
                <li><a href="events.php">Events</a>
                </li>
                <li><a href="message.php">Messages</a>
                </li>
                <li><a href="about.php">About</a>
                </li>
                <li><a href="sponsors.php">Sponsors</a>
                </li>
            </ul>
            <?php
                $urlVar = 'database/';
                include($urlVar . "login_userAccess.php");
            ?>
        </div>
        <!-- end div #menu -->

    </div>
    <!-- end div #header-->
     <!-- START of call to actions  -->
    <div class="row row-padding-small row-dgray">
        <div class="container">
            <div class="col w-2col m-2col">
                <a href="signUp.php.html">
                    <div class="cta">
                        <div class="txtBox100x20">
                            <div class="row-fixedHeight">
                                <h1>Join</h1>
                                <h2>Townsville Community Music Centre.</h2>
                            </div>
                        </div>
                        <div class="imgBox90">
                            <img src="database/images/musos/Celtic-Fyre-Wall-with-Fire8.jpg" >
                        </div>
                        <div class="txtBox100x30">
                            <div class="row-fixedHeight">
                                <h2>Members benefit!</h2>
                                <p><strong>Enjoy</strong> the benefits of becoming a member.</p>

                                <ul>
                                    <li>Massive discounts on Tickets
                                    </li>
                                    <li>Keep up to date with gigs.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col w-2col m-2col">
                <a href="events.php">
                    <div class="cta">
                        <div class="txtBox100x20">
                            <div class="row-fixedHeight">
                                <h1>TMCC Events</h1>
                            </div>
                        </div>
                        <div class="imgBox90">
                            <img  src="database/images/events/AVIVA-LANE500.jpg" alt="Dynamic event image" >
                        </div>
                        <div class="txtBox100x30">
                            <div class="row-fixedHeight">
                                <h2>Friday 26 May</h2>
                                <p>Aviva Lane - Get your tickets NOW</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- END of call to actions  -->
    
    <div class="row row-padding-large row-gray">
        
        <div class="container ">
            <!-- START of RSS Feed -->
            <div class="col w-2col m-2col">
                <div class="box">
                    <h1>Gigs in Townsville</h1>
                    <?php /* Here, we 'll loop through all of the items in the feed, and $item represents the current item in the loop.
        */
                       foreach ($feed->get_items() as $item):
                    ?>

                    <div class="rssItem">
                        <h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
                        <p><?php echo $item->get_description(); ?></p>
                        <p><small>Posted on <?php echo $item->get_date('j F Y | g:i a '); ?></small></p>
                    </div>

                    <?php endforeach; ?>
                 </div>
            </div>
            <!-- END of Rss Feed  -->
            
            <div class="col w-2col m-2col">
                <!-- Start of TSV Music -->
                <div class="box">
                    <h1>Music in Townsville</h1>
                    <h2>Townsville has a rich and diverse musical history.</h2>
                    <img src="database/images/SiteImages/30yearslogo336.png" alt="thirty years" >
                    <h3>The Townsville community music center celebrated its 30th year in 2013.</h3>

                    <p>It has been constantly changing over the years to keep up to date with the <a href="bands.php">musical tastes</a> and needs of the Townsville community.</p>
                    <p>As part of the relocation of the Music Centre to the Civic Theatre, Bronia Renison and Jean Dartnall, both librarians, have assessed the old collection of sheet music, books and recorded music which the centre has been storing, unused, for many years.</p>
                    <br>
                    <p>Sometimes older things have to be discarded to make way for the new, but the Music Centre is aware that older material may still have value.</p>
                    <p>The National Library of Australia has an online catalogue (TROVE) that lists not only its own holdings but also information about items held by many other libraries around Australia.</p>
                    <p>Using this catalogue Bronia and Jean have identified at least 150 items of music that are not held by any of the country's major libraries.</p>
                    <br>
                    <p>These items have been donated to the National Library to include in their collection and thus made available to all historians and musicians.</p>
                    <p>Also discovered in the old collection were some pieces relevant to North Queensland.</p>
                    <p>Local musicians performed these at a musical social afternoon on Sunday April 21st in C2 at the Civic Theatre.</p>
                    <p>The remaining sheet music, books and CDs were put on display and distributed free of charge to the local music community.</p>
                    
                    
                    
                </div>
            </div>
                <!-- End of TSV Music -->
            <div class="col w-2col m-2col">
                <!-- Start of Learn Music -->
                <div class="box">
                    <h1>Learn music</h1>
                    <h2>Learning music is fun - and good for you.</h2>
                    <img class="float-Left" src="assets/img/Feeder/LearningMusic.jpg" alt="Learning music">
                    <p> 
                        There have been many studies done on how leaning music can help exercise your brain and increase your mental abilities.
                    </p>
                    <br>
                    <p>
                        Learning or continuing to play music throughout your life can help reduce the mental effects of ageing.
                    </p>
                    <br>
                    <p>
                        If you would like to <a href="message.php">give it a shot</a> check out our <a href="message.php">message boards.</a>
                    </p>
                    
                </div>
                <!-- End of Learn Music -->
            </div>
            <div class="col w-2col m-2col">
                <!-- Start of Music Events-->
                <div class="box">
                    <h1>Townsville Music Events</h1>
                    <img class="float-Right" src="assets/img/Feeder/Attori4w300.jpg" alt="Attori on stage">
                    <h2>Wondering what music events are on in Townsville?</h2>
                    
                    <p> 
                        Here at the <strong>Townsville Community Music Center</strong> we love music of all shapes and sizes.
                    </p>
                    <p>
                        We even  <a href="events.php">Host our own events</a> from <a href="bands.php">Punks with kilts</a> to <a href="bands.php">Classical guitar</a> we have all genres covered.
                    </p>
                    
                </div>
                <!-- End of Music Events -->
            </div>
            
            
        </div>
        
    </div>
   
    <!-- START guilt trip -->
    <div class="row row-padding row-black">
        <a href="volunteer.php">
            <div class="container">
                <div class="vollieCTA">
                    <h2 class="intro-text">"Its so much more fun when you are involved, you get to meet everyone and enjoy the spirit of entertaining" - Nadia first time volunteer.</h2>
                    <h2>Help us and have fun!!</h2>
                </div>
            </div>
        </a>
    </div>
    <!-- END guilt trip -->

    
    
    
    <!-- START minor call to action -->
    <div class="row row-padding-small row-gray">
        <div class="container cta-4x">
            <!-- May not need this class??-->

            <div class="col w-1col m-1col">
                <a href="about.php">
                    <h3>Contacts</h3>
    
                    <ul>
                        <li>Phone:
                        </li>
                        <li>07 4724 2086
                        </li>
                        <li>Mobile:
                        </li>
                        <li>0402 255 182
                        </li>
                        <li>
                            <a href="mailto:admin@townsvillemusic.org">Email Us:</a>
                        </li>
                    </ul>
                </a>

            </div>


            <div class="col w-1col m-1col">
                <a href="signUp.php">
                    <h3>Sign Up</h3>
                    <p>Become a member Instantly!!
                    </p>
                    <p>
                        <br>Get <strong>massive discounts</strong> on your event tickets.
                    </p>
                </a>
            </div>


            <div class="col w-1col m-1col">
                <a href="events.php">
                    <h3>Events</h3>
                    <p>View all upcoming events.
                    </p>
                    <p>
                        <br> Get your tickets now!!!
                    </p>
                </a>
            </div>


            <div class="col w-1col m-1col">
                <a href="sponsors.php">
                    <h3>Sponsors</h3>
                    <p>We love our sponsors.
                    </p>
                    <p>
                        <br> Give them your support!!!
                    </p>
                </a>
            </div>

        </div>
    </div>
    <!-- END minor calls to action -->
    
    <!--Start sponsors list-->

    <div class="row row-white">

        <div class="sponsors">
            <div class="col">
                <ul>
                    <li><img src="database/images/SiteImages/30anniversary02300.png"  alt="TCMC 30 years logo"/>
                    </li>
                    <li><img src="database/images/SiteImages/TCCcolour150193.gif"  alt="city of Townsville logo"/>
                    </li>
                    <li><img src="database/images/SiteImages/Qldlogo150169.jpg" alt="Queensland Government logo"/>
                    </li>
                    <li><img src="database/images/events/JCUlogo200.jpg" alt="James Cook University logo"/>
                    </li>
                    <li><img src="database/images/events/KMEIAlogo.jpg" alt="Music Education Institute Of Australia"/>
                    </li>
                </ul> 
            </div>      
        </div>   
    </div>

    <!--End sponsors list-->
    <!-- START Copyright -->
    <div class="row row-padding row-black">
        <div class="container">
            <p class="footer-text">

                <br> Copyright © Tomato Websters 2015
            </p>
        </div>
    </div>
    <!-- End Copyright -->
</body>

</html>