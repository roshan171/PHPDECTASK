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

    // Delete from admin table
    $delete_admin = "DELETE FROM `admin` WHERE id = '$delete_id'";
    mysqli_query($conn, $delete_admin);

    header('location:admin_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admins Accounts</title>

   <!-- Font Awesome CDN link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- Admins accounts section starts  -->

<section class="accounts">

   <h1 class="heading">Admins Account</h1>

   <div class="box-container">

   <div class="box">
      <p>Register new admin</p>
      <a href="register_admin.php" class="option-btn">Register</a>
   </div>

   <?php
       $sql = "SELECT * FROM admin";
       $result = mysqli_query($conn, $sql);
       $i = 1;
 
      if (mysqli_num_rows($result) > 0) {
 
          while ($row = mysqli_fetch_assoc($result)) { 
   ?>
   <div class="box">
      <p> Admin ID : <span><?= $row['id']; ?></span> </p>
      <p> Username : <span><?= $row['name']; ?></span> </p>
      <div class="flex-btn">
         <a href="admin_accounts.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this account?');">Delete</a>
         <?php
            if ($row['id'] == $username) {
               echo '<a href="update_profile.php" class="option-btn">Update</a>';
            }
         ?>
      </div>
   </div>
   <?php
      }
   } else {
      echo '<p class="empty">No accounts available</p>';
   }
   ?>

   </div>

</section>

<!-- Admins accounts section ends -->

<!-- Custom JS file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
