<!DOCTYPE html>
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
        <!-- start div navigation-->
        
        <div class="navigation">
            <div class="float-Left">
                <img src="assets/img/TCMC98Neg.gif" alt="TCMC Logo" >
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
    
    
    <!--TODO: decribe registration benefits, and menbers benefits, paypal link-->

    
    <!-- START of  Vollie Form -->
    <div class="row row-padding-large row-gray">
        <div class="container volunteer">
            <div class="col w-1col m-1col"> 
                <div class="row-black">
                    <img src="assets/img/TCMC98Neg.gif" alt="TCMC Logo" >
                    
                    <div class="imgBox90">
                        <?php
                            include("database/images_GenerateRandom.php");
                        ?>

                    </div>
                    
                </div>
            </div>
            <div class="col w-2col m-2col"> 
                <h1>Be a part of the action - Volunteer</h1>
                <h2>Music in Townsville cannot survive without <strong>you!</strong></h2>
                <h3>Volunteering is fun!</h3>
                <p>If you enjoy music events why not try your hand at volunteering?</p>
                <p>Most people find that volunteeriong is far more satisfying and rewarding than just goin to an event,</p>
                <p>Not to mention you get in for free....</p>
                <br>
                <h3>Volunteering is rewarding!</h3>
                <p>Participating haas many rewards. Who knows who you could meet?</p>
                <p>Anyone interested in a career in the music / entertainment industry will pick up valuable skills when volunteering</p>
                <p>Ever wondered what it would be like to be a sart of a spectaular even?</p>
                <br>
                <h3>You decide your level of commitment</h3>
                <p>As a volunteer you are ultimately in control of your time commitments.</p>
                <p>Its not a Job!!!</p>
                <p>Be a part of <strong>your</strong> community.</p>
                <br>
                <div class="volSignup box">
                    <h1>Volunteer Now</h1>
                    <h2>So what are you waiting for?</h2>
                    <p>The TCMC is always on the lookout for skilled and unskilled(is there such a thing?) volunteers </p>
                    <a href="mailto:admin@townsvillemusic.org">The best thing to do is send us an email with a quick description of your time and skills</a>
                </div>
            </div>
            <div class="col w-1col m-1col"> 
                <div class="row-black">
                    <img src="assets/img/TCMC98Neg.gif" alt="TCMC Logo" >
                    <div class="imgBox90">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END of  Vollie email -->
    
    <!-- Start of  About-PAidMember -->
    <div class="row row-padding-large row-white">
        <div class="container About-PaidMember">
            <div class="col w-1col m-1col"> 
                <div class="row-black">
                    <img src="assets/img/TCMC98Neg.gif" alt="TCMC Logo" >
                </div>
            </div>
            <div class="col w-2col m-2col"> 
                <h1>Become a paid member and reap the rewards</h1>

                <div class="volSignup box">
                    <h1>Become a financial member now.</h1>
                    <h2>Member have benefits.</h2>
                    <p>Up to 50% off event tickets. </p>
                    <p>Notice of upcoming events. </p>
                    <p>Create you oen band page. </p>
                    <br>
                    <a href="mailto:admin@townsvillemusic.org">The best thing to do is send us an email us with your details</a>
                    <br>
                    
                    <div class="col w-4col m-4col">
                        <H3>To become a finincial member you can pay via paypal:</H3>
                    
                    
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_s-xclick" >
                            <input type="hidden" name="hosted_button_id" value="GCRJ28AFLXURQ" >
                            <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_paynow_SM.gif" name="submit" alt="PayPal � The safer, easier way to pay online." >
                            <img alt="PayPal � The safer, easier way to pay online." src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1" >
                        </form>
                    </div>
                    
                    
                    <div class="col w-4col m-4col">
                        <H3>Donations are all tax deductable</H3>
                        
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_s-xclick" >
                            <input type="hidden" name="hosted_button_id" value="67K2M93WVJM2L" >
                            <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donate_SM.gif" name="submit" alt="PayPal � The safer, easier way to pay online." >
                            <img alt="PayPal � The safer, easier way to pay online." src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1" >
                        </form>
                    </div>
                    <h2>We also accept direct deposits.</h2>
                    <a href="http://townsvillemusic.org.au/docs/Membership%20applic%20form%202015.doc">Email this form back to us once you have made you deposit</a>
                    

                        
                </div>
            </div>
            <div class="col w-1col m-1col"> 
                <div class="row-black">
                    <img src="assets/img/TCMC98Neg.gif" alt="TCMC Logo" >
                </div>
            </div>
        </div>
    </div>
    <!-- END of  About-PAidMember -->

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
                    </ul>
                </a>
                <ul>
                    <li>
                        <a href="mailto:admin@townsvillemusic.org">Email Us:</a>
                    </li>
                </ul>


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
                    <li><img src="assets/img/30anniversary02300.png"  alt="TCMC 30 years logo">
                    </li>
                    <li><img src="assets/img/TCCcolour150193.gif"  alt="city of Townsville logo">
                    </li>
                    <li><img src="assets/img/Qldlogo150169.jpg" alt="Queensland Government logo">
                    </li>
                    <li><img src="assets/img/JCUlogo200.jpg" alt="James Cook University logo">
                    </li>
                    <li><img src="assets/img/KMEIAlogo.jpg" alt="Music Education Institute Of Australia">
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
