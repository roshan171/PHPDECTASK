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
    $delete_message = "DELETE FROM `message` WHERE id = '$delete_id'";
    mysqli_query($conn, $delete_message);
    header('location:messages.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>

    <!-- Font Awesome CDN link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom CSS file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- Messages section starts  -->

<section class="messages">

    <h1 class="heading">Messages</h1>

    <div class="box-container">

    <?php
        $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('Query failed');
        $i = 1;

        if (mysqli_num_rows($select_messages) > 0) {
            while ($row = mysqli_fetch_assoc($select_messages)) {
    ?>
    <div class="box">
        <p> Name : <span><?= $row['name']; ?></span> </p>
        <p> Number : <span><?= $row['phone']; ?></span> </p>
        <p> Email : <span><?= $row['email']; ?></span> </p>
        <p> Message : <span><?= $row['message']; ?></span> </p>
        <a href="messages.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this message?');">Delete</a>
    </div>
    <?php
            }
        } else {
            echo '<p class="empty">You have no messages</p>';
        }
    ?>

    </div>

</section>

<!-- Messages section ends -->

<!-- Custom JS file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
