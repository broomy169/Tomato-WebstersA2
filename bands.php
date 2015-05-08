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
            <ul>
                <li><a href="index.html">Home</a>
                </li>
                <li class="active"><a href="bands.php">bands</a>
                </li>
                <li><a href="events.html">Events</a>
                </li>
                <li><a href="message.html">Messages</a>
                </li>
                <li><a href="About.html">About</a>
                </li>
                <li><a href="sponsors.html">Sponsors</a>
                </li>
            </ul>
        </div>
        <!-- end div #menu -->
        <div class="row-right">
            <a href="signInUp.html">Sign Up - Sign In</a>

        </div>
    </div>
    <!-- end div #header-->

    <!--- START of call to actions  -->
    <div class="row row-padding-small row-white">
        <div class="container">
            <div class="col w-2col m-2col">
                <a href="signUpIn.html">
                    <div class="cta-signUpIn">
                        <h1>SignIn or SignUp</h1>
                        <img src="database/images/musos/CelticFyre800.jpg" width="90%">
                        <p>kaejdkjsdhgsadjkgsdljghsldg</p>
                    </div>
                </a>

            </div>
            <div class="col w-2col m-2col">
                <a href="Events.html">
                    <div class="cta-events">
                        <h1>Events</h1>
                        <img src="database/images/musos/CelticFyre800.jpg" width="90%">
                        <p>kaejdkjsdhgsadjkgsdljghsldg</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--- END of call to actions  -->
    <!--- START of artists list ---->
    <div class="row row-padding-large row-gray">
        <div class="container bands">
            <ul>
                <?php
                $urlVar = 'database/';
                include($urlVar . 'band_list.php'); //included file to pull and displays all artists/band information from sqlite
                ?>
            </ul>

        </div>
    </div>
    <!--- END of artists list ---->
    <!--- START guilt trip -->
    <div class="row row-padding row-black">
        <a href="Volunteer.html">
            <div class="container">
                <h2 class="intro-text">
                Not a single gig would ever get off the ground without the tireless efforts of volunteers.<br></h2>
                <h2>Help us and have fun!!
                </h2>
            </div>
        </a>
    </div>
    <!--- END guilt trip -->
    <!-- START minor call to action -->
    <div class="row row-padding row-white">
        <div class="container cta-4x">
            <!-- May not need this class??-->

            <div class="col w-1col m-1col">
                <a href="aboutUs.html">
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
                        <li><a href="mailto:admin@townsvillemusic.org">Email Us:</a>
                        </li>
                    </ul>
                </a>
            </div>


            <div class="col w-1col m-1col">
                <a href="signUp.html">
                    <h3>Sign Up</h3>
                    <p>Become a member Instantly!!
                    </p>
                    <p>
                        <br>Get <strong>massive discounts</strong> on your event tickets.
                    </p>
                </a>
            </div>


            <div class="col w-1col m-1col">
                <a href="upcomingEvents.html">
                    <h3>Events</h3>
                    <p>View all upcoming events.
                    </p>
                    <p>
                        <br> Get your tickets now!!!
                    </p>
                </a>
            </div>


            <div class="col w-1col m-1col">
                <a href="sponsors.html">
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
    <!-- START Copyright -->
    <div class="row row-padding row-black">
        <div class="container">
            <p class="footer-text">

                <br> Copyright &copy; Tomato Websters 2015
            </p>
        </div>
    </div>
    <!-- End Copyright -->
</body>

</html>