<?php 
include('Component/connection.php');
?>
<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.6.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.6.4, mobirise.com">
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:image:src" content="">
  <meta property="og:image" content="">
  <meta name="twitter:title" content="Home">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Vasundhara</title>
  <link rel="stylesheet" href="css/mobirise2.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/recaptcha.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=League+Spartan:100,200,300,400,500,600,700,800,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=League+Spartan:100,200,300,400,500,600,700,800,900&display=swap"></noscript>
  <link rel="preload" as="style" href="css/mbr-additional.css"><link rel="stylesheet" href="css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu1 cid-t9FzZai8ud" once="menu" id="amenu1-0">
    

    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand navbar-brand-main">
                
                <span class="navbar-caption-wrap"><a class="navbar-caption navbar-caption-main text-black display-5" href="index.php" style="text-decoration:none;">Vasundhara</a></span>
            </div>

            <ul class="navbar-nav navbar-nav-main nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black display-4" href="index.php">
                  Home
                </a></li>
                <li class="nav-item"><a class="nav-link link text-black display-4" href="#about">
                   About Us
                </a></li>
                <li class="nav-item"><a class="nav-link link text-black display-4" href="product.php">
                    Products
                </a></li>
                <li class="nav-item"><a class="nav-link link text-black display-4" href="#contact">
                    Contact
                </a></li></ul>
            <!-- <div class="navbar-buttons navbar-buttons-main mbr-section-btn"><a class="btn btn-black display-7" href="cart.php">
                    Cart</a></div> -->
                    
      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

                    <div class="icons">
                    <a href="cart.php" class="m-2"><i class="fas fa-shopping-cart">
                    cart <span>(<?php echo $row_count; ?>)</span>
                    </i>
                </a>
        
            <a href="logout.php" id="user-btn" class="fas fa-user m-2" ></a>
      
        </div>
            <button class="navbar-toggler navbar-toggler-open" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger-bg"></div>
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <button class="navbar-toggler navbar-toggler-close" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
                    <div class="hamburger-bg"></div>
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <ul class="navbar-nav sidbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black display-7" href="index.php">
                        Home
                    </a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-7" href="#about">
                        About Us
                    </a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-7" href="product.php">
                        Products
                    </a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-7" href="#contact">
                       Contact
                </ul>
                <div class="icons">
                    <a href="cart.php" class="m-2"><i class="fas fa-shopping-cart"></i></a>
        
            <a href="login.php" id="user-btn" class="fas fa-user m-2" ></a>
      
        </div>
            </div>
        </div>
    </nav>
</section>
