<?php

include '../component/connection.php';

session_start();

$username = $_SESSION['name'];

if (!isset($username)) {
    header('location:admin_login.php');
    exit;
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Delete from users table
    $delete_users = "DELETE FROM `users` WHERE id = '$delete_id'";
    mysqli_query($conn, $delete_users);

    // Delete from orders table
    $delete_order = "DELETE FROM `orders` WHERE name = '$delete_id'";
    mysqli_query($conn, $delete_order);

    // Delete from cart table
    $delete_cart = "DELETE FROM `cart` WHERE name = '$delete_id'";
    mysqli_query($conn, $delete_cart);

    header('location:users_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users Accounts</title>

   <!-- Font Awesome CDN link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- User accounts section starts  -->

<section class="accounts">

   <h1 class="heading">Users Account</h1>

   <div class="box-container">

   <?php
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      $i = 1;

     if (mysqli_num_rows($result) > 0) {

         while ($row = mysqli_fetch_assoc($result)) { 
   ?>
   <div class="box">
      <p> User ID : <span><?= $row['id']; ?></span> </p>
      <p> Username : <span><?= $row['username']; ?></span> </p>
      <a href="users_accounts.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this account?');">Delete</a>
   </div>
   <?php
      }
   } else {
      echo '<p class="empty">No accounts available</p>';
   }
   ?>

   </div>

</section>

<!-- User accounts section ends -->

<!-- Custom JS file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
