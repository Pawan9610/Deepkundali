<?php include('../config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto+Condensed'> 
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/mob-nav.css">
        
        <title>Admin</title>
        
    </head>
    <body>  
        
        <main class="border">
            <div class="logo border center"><span class="site-title">DeepKundali         </span>
            
                                            <!-- Navbar for mobile strats from here -->
                                            <nav role="navigation">
                                            <div id="menuToggle">
                                            <!--
                                            A fake / hidden checkbox is used as click reciever,
                                            so you can use the :checked selector on it.
                                            -->
                                            <input type="checkbox" />
                                            
                                            <!--
                                            Some spans to act as a hamburger.
                                            
                                            They are acting like a real hamburger,
                                            not that McDonalds stuff.
                                            -->
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            
                                            <!--
                                            Too bad the menu has to be inside of the button
                                            but hey, it's pure CSS magic.
                                            -->
                                            <ul id="menu">
                                                    <li><a href="./index.php"><i class="bi bi-house">Home</i></a></li>
                                                    <li><a href="./pandit.php"><i class="bi bi-people">Pandit</i></a></li>
                                                    <li><a href="#"><i class="bi bi-ui-checks-grid">Blog</i></a></li>
                                                    <li><a href="#"><i class="bi bi-ui-checks-grid">Blog</i></a></li>
                                                    <li><a href="#"><i class="bi bi-ui-checks-grid">Blog</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">Order</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">order</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">order</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">order</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">order</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">order</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">order</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">order</i></a></li>
                                                    <li><a href="#"><i class="bi bi-box">order</i></a></li>
                                                    
                                                </ul>
                                            </div>
                                        </nav>
                                        <!-- Navbar for mobile end -->
                                        </div>
                    <?php include('menu.php')?>
                    <div class="header border center shadow">
                        <div class="admin-name center"><p class="secondry-color">WELCOME 
                        <?php 
                            if (isset($_SESSION['login'])) {
                                echo $_SESSION['login']; //Dispalying Session Message
                                unset($_SESSION['login']); // Removing Session Message
                            }
                        ?>PAWAN ADMIN PANEL</p>
                        </div>
                        <div class="admin-tool center">
                            <div class="avtar center"></div>
                            <div class="search bg-primary-color center"></div>
                        </div>
                    </div>