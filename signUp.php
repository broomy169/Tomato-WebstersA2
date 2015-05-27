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
   <!-- <script src="assets/js/respond.min.js"></script> -->
    <script src="database/signup_formValidation.js"></script>
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

    
    <!-- START of  signup form -->
    <div class="row row-padding-large row-gray">
        <div class="container signUp">
            <div class="col w-2col m-2col">
                
                <h1>Membership Registration Form</h1>

                <form id="signUp" name="signUp" action="database/signup_databaseProccess.php" method="post">
                    <h3>Personal Details: </h3>
                    <span class='error'>* required fields</span></p>
                    <p>
                        <label for="user_firstName">First Name: </label>
                        <input type="text" id="user_firstName" name="user_firstName" autofocus><span class='error'>*</span>
                    </p>
                    <p>
                        <label for="user_lastName">Last Name: </label>
                        <input type="text" id="user_lastName" name="user_lastName"><span class='error'>*</span>
                    </p>
                    <p>
                        <label for="user_phone">Day Phone: </label>
                        <input type="number" id="user_phone" name="user_phone"><span class='error'>*</span>
                    </p>
                    <p>
                        <label for="user_phoneAfterHours">After hours Phone: </label>
                        <input type="number" id="user_phoneAfterHours" name="user_phoneAfterHours">
                    </p>
                    <p>
                        <label for="user_mobile">Mobile: </label>
                        <input type="number" id="user_mobile" name="user_mobile">
                    </p>
                    <p>
                        <input type="hidden" id="user_accessLevel" name="user_accessLevel" value="free">
                    </p>
                    <p>
                        <label for="user_address">Postal Address: </label>
                        <textarea id="user_address" name="user_address"></textarea>
                    </p>
                    
                    <h3>Create Account</h3>
                    <p>
                        <label for="user_email">Email: </label>
                        <input type="text" id="user_email" name="user_email" placeholder="Email address"><span class='error'>*</span>
                    </p>
                    <p>
                        <label for="user_password">Password: </label>
                        <input type="password" id="user_password" name="user_password" placeholder="Enter password"><span class='error'>*</span>
                    </p>
                    <p>
                        <label for="user_password_check">Confirm Password: </label>
                        <input type="password" id="user_password_check" name="user_password_check" placeholder="Confirm Password"><span class='error'>*</span>
                    </p>
                    <input type="submit" name="submit" id="submit" value="Sign Up" onclick="return validateSignUpForm();">
                </form>
            </div>
        </div>
    </div>
    <!-- END of  signup form -->

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
                    <li><img src="assets/img/30anniversary02300.png.png"  alt="TCMC 30 years logo"/>
                    </li>
                    <li><img src="assets/img/TCCcolour150193.gif"  alt="city of Townsville logo"/>
                    </li>
                    <li><img src="assets/img/Qldlogo150169.jpg" alt="Queensland Government logo"/>
                    </li>
                    <li><img src="assets/img/JCUlogo200.jpg" alt="James Cook University logo"/>
                    </li>
                    
                    </li>
                    <li><img src="assets/img/KMEIAlogo.jpg" alt="Music Education Institute Of Australia"/>
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
