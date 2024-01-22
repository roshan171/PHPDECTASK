<?php

include '../component/connection.php';

session_start();

$username = $_SESSION['name'];

if (!isset($username)) {
    header('location:admin_login.php');
    exit;
}

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $pass = $_POST['password'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = $_POST['confirm_password'];
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $select_admin = "SELECT * FROM `admin` WHERE name = '$name'";
    $result = mysqli_query($conn, $select_admin);

    if (mysqli_num_rows($result) > 0) {
      echo "<script>alert('Username already exists!')</script>";
        
    } else {
        if ($pass != $cpass) {
         echo "<script>alert('Confirm password not matched!')</script>";
            
        } else {
            $insert_admin = "INSERT INTO `admin` (name, password,confirm_password) VALUES ('$name', '$pass','$cpass')";
            if (mysqli_query($conn, $insert_admin)) {
                echo "<script>alert('Successfully Register..')</script>";
            } else {
                $message[] = 'Error: ' . mysqli_error($conn);
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- Font Awesome CDN link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- Register admin section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>Register New Admin</h3>
      <input type="text" name="name" maxlength="20" required placeholder="Enter your username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="password" maxlength="20" required placeholder="Enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="confirm_password" maxlength="20" required placeholder="Confirm your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Register Now" name="submit" class="btn">
   </form>

</section>

<!-- Register admin section ends -->

<!-- Custom JS file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
