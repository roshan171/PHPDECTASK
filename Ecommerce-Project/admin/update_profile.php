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

    if (!empty($name)) {
        $select_name = mysqli_query($conn, "SELECT * FROM `admin` WHERE name = '$name'");
        if (mysqli_num_rows($select_name) > 0) {
            $message[] = 'Username already taken!';
        } else {
            $update_name = mysqli_query($conn, "UPDATE `admin` SET name = '$name' WHERE name = '$username'");
            $username = $name; // Update the session variable with the new username
        }
    }

    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $select_old_pass = mysqli_query($conn, "SELECT password FROM `admin` WHERE name = '$username'");
    $fetch_prev_pass = mysqli_fetch_assoc($select_old_pass);
    $prev_pass = $fetch_prev_pass['password'];
    $old_pass = $_POST['old_pass'];
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    $new_pass = $_POST['new_pass'];
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $confirm_pass = $_POST['confirm_pass'];
    $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

    if ($old_pass != $empty_pass) {
        if ($old_pass != $prev_pass) {
            echo "<script>alert('Old password not matched!')</script>";
            
        } elseif ($new_pass != $confirm_pass) {
            echo "<script>alert('Confirm password not matched!')</script>";
        
        } else {
            if ($new_pass != $empty_pass) {
                $update_pass = mysqli_query($conn, "UPDATE `admin` SET password = '$confirm_pass' WHERE name = '$username'");
    
                echo "<script>alert('Password updated successfully!')</script>";
               
            } else {
                echo "<script>alert('Please enter a new password!')<script>";
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
    <title>Profile Update</title>

    <!-- Font Awesome CDN link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom CSS file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- Admin profile update section starts  -->

<section class="form-container">

    <form action="" method="POST">
        <h3>Update Profile</h3>
        <input type="text" name="name" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')"
               placeholder="<?= $username; ?>">
        <input type="password" name="old_pass" maxlength="20" placeholder="Enter your old password" class="box"
               oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="new_pass" maxlength="20" placeholder="Enter your new password" class="box"
               oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="confirm_pass" maxlength="20" placeholder="Confirm your new password" class="box"
               oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="submit" value="Update Now" name="submit" class="btn">
    </form>

    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<p class="message bg-success">' . $msg . '</p>';
        }
    }
    ?>

</section>

<!-- Admin profile update section ends -->

<!-- Custom JS file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
