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
                <li class="active"><a href="sponsors.php">Sponsors</a>
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


    <!-- START of  Sponsors -->
    <div class="row row-padding-large row-gray">
        <div class="container sponsors">
            <div class="col w-4col m-2col">
                <div class="box">
                    <h1>Thanks for your sponsorship.</h1>
                    <h2>The Music Centre receives vital support from the sponsors featured on this page</h2>
                    <p>
                        Our music concerts are well-publicised and well-attended and sponsors enjoy brand exposure throughout the Arts community. 
                    </p>
                    <br>
                    <p>
                        We welcome sponsorship or assistance in any form.
                    </p>
                </div>
            </div>
            <div class="col w-2col m-2col">

                <h1>Townsville City Council</h1>
                <img src="assets/img/TCCcolour150193.gif">
                
                <p>
                    <strong>The Council's Partnerships and Sponsorships scheme provides vital core funding</strong> which enables us to maintain the administrative base for all our other activities, and also provides the premises which house our office space. 
                </p>
                <br>
                <p>
                    The Council also assists with the performance venues for our concerts and workshops. 
                </p>

            </div>
            <div class="col w-2col m-2col">
                
                <h1>Queensland Government</h1>
                <img src="database/images/SiteImages/GCBF15091.png">
                <p>
                    The Gambling Community Benefit Fund has assisted us to obtain office equipment and sound and lighting equipment for our productions 
                </p>


            </div>
        </div>
    </div>
    <!-- END of  Sopnsors -->
    <!-- START of call to actions  -->
    <div class="row row-padding-small row-dgray">
        <div class="container">
            <div class="col w-2col m-2col">
                <a href="signUp.php">
                    <div class="cta">
                        <div class="txtBox100x20">
                            <div class="row-fixedHeight">
                                <h1>SignIn</h1>
                            </div>
                        </div>
                        <div class="imgBox90">
                            <img src="assets/img/Celtic-Fyre-Wall-with-Fire8.jpg" >
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
                                <h1>Events</h1>
                            </div>
                        </div>
                        <div class="imgBox90">
                            <img  src="assets/img/AVIVA-LANE500.jpg" alt="Dynamic event image" >
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
