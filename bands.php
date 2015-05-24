<?php
if (!isset($_SESSION)){
    session_start();
}

unset($_SESSION["'Rock'"]);
unset($_SESSION["'Pop'"]);
unset($_SESSION["'Metal'"]);
unset($_SESSION["'Jazz'"]);
unset($_SESSION["'Classical'"]);
unset($_SESSION["'Country'"]);
unset($_SESSION["'Hip Hop'"]);
unset($_SESSION["'Rap'"]);
if (!empty($_POST["genre"])) {
    // keeping each selected checkbox in session so after refresh checkboxes keep the selection state
    foreach ($_POST["genre"] as $checked){

        $_SESSION[$checked] = "checked";
    }
}

?>

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
        <div class="navigation">
            <div class="float-Left">
                <img src="database/images/SiteImages/TCMC98Neg.gif" alt="TCMC Logo" >
            </div>
            <ul>
                <li><a href="index.php">Home</a>
                </li>
                <li class="active"><a href="bands.php">bands</a>
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

    <!-- START of artists list -->
    <div class="row row-padding-large row-gray">
        <div class="container bands">
            <h1>Bands / Artists</h1>
            <form method="post" action="bands.php">
                <label>Rock</label><input type="checkbox" name="genre[]" value="'Rock'" <?php if(isset($_SESSION["'Rock'"])) echo "checked='checked'"; ?>>
                <label>Pop</label><input type="checkbox" name="genre[]" value="'Pop'" <?php if(isset($_SESSION["'Pop'"])) echo "checked='checked'"; ?>>
                <label>Metal</label><input type="checkbox" name="genre[]" value="'Metal'" <?php if(isset($_SESSION["'Metal'"])) echo "checked='checked'"; ?>>
                <label>Jazz</label><input type="checkbox" name="genre[]" value="'Jazz'" <?php if(isset($_SESSION["'Jazz'"])) echo "checked='checked'"; ?>>
                <label>Classical</label><input type="checkbox" name="genre[]" value="'Classical'" <?php if(isset($_SESSION["'Classical'"])) echo "checked='checked'"; ?>>
                <label>Country</label><input type="checkbox" name="genre[]" value="'Country'" <?php if(isset($_SESSION["'Country'"])) echo "checked='checked'"; ?>>
                <label>Hip Hop</label><input type="checkbox" name="genre[]" value="'Hip Hop'" <?php if(isset($_SESSION["'Hip Hop'"])) echo "checked='checked'"; ?>>
                <label>Rap</label><input type="checkbox" name="genre[]" value="'Rap'" <?php if(isset($_SESSION["'Rap'"])) echo "checked='checked'"; ?>>
                <input type="submit" name="submit" value="sort">
            </form>

            <ul>
                <?php

                $urlVar = 'database/';
                include($urlVar . 'band_list.php'); //included file to pull and displays all artists/band information from sqlite
                ?>
            </ul>

        </div>
    </div>
    <!-- END of artists list -->
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
     <!-- START of call to actions  -->
    <div class="row row-padding-small row-dgray">
        <div class="container">
            <div class="col w-2col m-2col">
                <a href="signUp.php.html">
                    <div class="cta">
                        <div class="txtBox100x20">
                            <div class="row-fixedHeight">
                                <h1>SignIn</h1>
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
                                <h1>Events</h1>
                            </div>
                        </div>
                        <div class="imgBox90">
                            <img  src="database/images/events/AVIVA-LANE500.jpg" alt="Dynamic event image">
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
    
    
    
    <!-- START minor call to action -->
    <div class="row row-padding-small row-gray">
        <div class="container cta-4x">
            <!-- May not need this class??-->

            <div class="col w-1col m-1col">
                <a href="about.php">
                    <h3>Contacts</h3>
                </a>
                <ul>
                    <a href="about.php">
                        <li>Phone:
                        </li>
                        <li>07 4724 2086
                        </li>
                        <li>Mobile:
                        </li>
                        <li>0402 255 182
                        </li>
                    </a>
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
                    <li><img src="database/images/SiteImages/30anniversary02300.png"  alt="TCMC 30 years logo"/>
                    </li>
                    <li><img src="database/images/SiteImages/TCCcolour150193.gif"  alt="city of Townsville logo"/>
                    </li>
                    <li><img src="database/images/SiteImages/Qldlogo150169.jpg" alt="Queensland Government logo"/>
                    </li>
                    <li><img src="database/images/events/JCUlogo200.jpg" alt="James Cook University logo"/>
                    </li>
                    
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