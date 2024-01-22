<?php

include '../component/connection.php';

session_start();

$username = $_SESSION['name'];

if (!isset($username)) {
    header('location:admin_login.php');
    exit;
}

if (isset($_POST['update_payment'])) {

    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];
    $update_status = "UPDATE `orders` SET payment_status = '$payment_status' WHERE id = '$order_id'";
    mysqli_query($conn, $update_status);
    $message[] = 'Payment status updated!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_order = "DELETE FROM `orders` WHERE id = '$delete_id'";
    mysqli_query($conn, $delete_order);
    header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placed Orders</title>

    <!-- Font Awesome CDN link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom CSS file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- Placed Orders section starts  -->

<section class="placed-orders">

    <h1 class="heading">Placed Orders</h1>

    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('Query failed');
        if (mysqli_num_rows($select_orders) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
    ?>
    <div class="box">
        <p> Id : <span><?php echo $fetch_orders['id']; ?></span> </p>
        <p> Placed on : <span><?php echo $fetch_orders['added_date']; ?></span> </p>
        <p> Product Id : <span><?= $fetch_orders['product_id']; ?></span> </p>
        <p> Payment Id : <span><?= $fetch_orders['payment_id']; ?></span> </p>
        <!-- <p> Payment Method : <span><?= $fetch_orders['method']; ?></span> </p> -->
    </div>
    <?php
            }
        } else {
            echo '<p class="empty">No orders placed yet!</p>';
        }
    ?>

    </div>

</section>

<!-- Placed Orders section ends -->

<!-- Custom JS file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
