<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pizza Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="includes/css/grid.css"/>
        <link rel="stylesheet" type="text/css" href="includes/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="includes/css/media.css"/>
        <link rel="stylesheet" type="text/css" href="includes/css/animate.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
        <header class="header-transparent">
            <nav class="top-bar-container">
                <div class="row">
                    <div class="top-bar-nav-left">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i>No 42, Galle Street</span>
                        <span><i class="fa fa-phone" aria-hidden="true"></i>123-456-789</span>
                        <span><i class="far fa-clock" aria-hidden="true"></i>9:00AM - 11:00 PM</span>
                    </div>
                    <div class="top-bar-nav-right">
                        <div class="nav-login">
                            <?php
                            echo (isset($_SESSION['username'])) ?
                            "<span class='login-info'>Howday! " . $_SESSION['username'] . " | <a href='logout.php'>Logout</a></span>" :
                            "<a href='login.php' title='Login'><i class='fas fa-user'></i></a>";
                            ?>
                        </div>
                        <div class="cart-container">
                            <a href="/prime-pizza/cart.php"><span class="cart-icon"><i class="fas fa-shopping-cart"></i></span></a>
                        <span class="cart-count"><?php echo (isset($_SESSION['cart_count'])) ? $_SESSION['cart_count'] : '0'; ?></span>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="primary-nav-bar-container">
                <div class="row">
                    <a href="/prime-pizza/"><img src="content/uploads/logo.png" alt="Pizza Store" class="logo"/></a>
                    <ul class="main-nav">
                        <li><a href="/prime-pizza/">Home</a></li>
                        <li><a href="#section-about">About Us</a></li>
                        <li><a href="#section-gallery">Gallery</a></li>
                        <li><a href="#section-featured-products">Products</a></li>
                        <li><a href="#section-testimonials">Testimonials</a></li>
                        <li><a href="#section-contact">Contact Us</a></li>
                    </ul>
                    <a class="mobile-nav-icon"><i class="fas fa-bars"></i></a>
                </div>
            </nav>
            <div class="main-title-container">
                <h1 class="banner-heading">Welcome to Prime Pizzas.</h1>
                <a class="btn btn-order-now" href="#section-about">About Us</a>
            </div>
        </header>