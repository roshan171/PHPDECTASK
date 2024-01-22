<?php

include '../component/connection.php';

session_start();

$username= $_SESSION['name'];

if(!isset($username)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

   <div class="box">
      <h3>welcome!</h3>
      <p><?= $username; ?></p>
      <a href="update_profile.php" class="btn">update profile</a>
   </div>

   <div class="box">
                 <?php
     $select_rows = mysqli_query($conn, "SELECT * FROM `admin`") or die('query failed');
     $row_count = mysqli_num_rows($select_rows);
          ?>
   
      <h3>admins</h3>
      <p><?php echo $row_count; ?></p>
      <a href="admin_accounts.php" class="btn">see admins</a>
   </div>

   <div class="box">
                 <?php
     $select_rows = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
     $row_count = mysqli_num_rows($select_rows);
          ?>
   
      <h3>Users</h3>
      <p><?php echo $row_count; ?></p>
      <a href="users_accounts.php" class="btn">see Users</a>
   </div>

   <div class="box">
                 <?php
     $select_rows = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
     $row_count = mysqli_num_rows($select_rows);
          ?>
   
      <h3>Products</h3>
      <p><?php echo $row_count; ?></p>
      <a href="products.php" class="btn">see products</a>
   </div>


   <div class="box">
                 <?php
     $select_rows = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
     $row_count = mysqli_num_rows($select_rows);
          ?>
   
      <h3>Messages</h3>
      <p><?php echo $row_count; ?></p>
      <a href="messages.php" class="btn">see messages</a>
   </div>


<!--    
   <div class="box">
                 <?php
     $select_rows = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
     $row_count = mysqli_num_rows($select_rows);
          ?>
   
      <h3>total orders</h3>
      <p><?php echo $row_count; ?></p>
      <a href="placed_orders.php" class="btn">see orders</a>
   </div> -->


  

</section>

<!-- admin dashboard section ends -->









<!-- custom js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>