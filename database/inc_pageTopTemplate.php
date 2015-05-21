<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Townville Community Music Centre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS links -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="header">


    <!-- start div navigation-->

    <div class="navigation">
        <div class="float-Left">
            <img src="images/SiteImages/TCMC98Neg.gif" >
        </div>
        <ul>
            <li><a href="index.php">Home</a>
            </li>
            <li><a href="../bands.php">bands</a>
            </li>
            <li><a href="../events.php">Events</a>
            </li>
            <li><a href="../message.php">Messages</a>
            </li>
            <li><a href="../about.php">About</a>
            </li>
            <li><a href="../sponsors.php">Sponsors</a>
            </li>
        </ul>
        <?php
        include("login_userAccess.php");
        ?>
    </div>
    <!-- end div #menu -->

</div>
<!-- end div #header-->

<!-- START of  Content -->


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