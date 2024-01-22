<?php

include '../component/connection.php';

session_start();

$username = $_SESSION['name'];

if (!isset($username)) {
    header('location:admin_login.php');
    exit;
}

if (isset($_POST['update'])) {
    $pid = $_POST['pid'];
    $pid = filter_var($pid, FILTER_SANITIZE_STRING);
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['amount'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
   

    $update_product_query = "UPDATE `products` SET name = '$name',  amount = '$price' WHERE id = $pid";
    mysqli_query($conn, $update_product_query);

    $message[] = 'product updated!';

    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploads/' . $image;

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'images size is too large!';
        } else {
            $update_image_query = "UPDATE `products` SET image = '$image' WHERE id = $pid";
            mysqli_query($conn, $update_image_query);

            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('../uploads/' . $old_image);
            $message[] = 'image updated!';
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
   <title>update product</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- update product section starts  -->

<section class="update-product">

   <h1 class="heading">update product</h1>

   <?php
   error_reporting(0);
      $update_id = $_GET['update'];
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

     if ($result->num_rows > 0) {

         while ($row = $result->fetch_assoc()) { 
   ?>
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $row['id']; ?>">
      <input type="hidden" name="old_image" value="<?= $row['image']; ?>">
      <img src="../uploads/<?= $row['image']; ?>" alt="">
      <span>update name</span>
      <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box" value="<?= $row['name']; ?>">
      <span>update price</span>
      <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="amount" onkeypress="if(this.value.length == 10) return false;" class="box" value="<?= $row['amount']; ?>">
   
      <span>update image</span>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <div class="flex-btn">
         <input type="submit" value="update" class="btn" name="update">
         <a href="products.php" class="option-btn">go back</a>
      </div>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>

</section>

<!-- update product section ends -->










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>