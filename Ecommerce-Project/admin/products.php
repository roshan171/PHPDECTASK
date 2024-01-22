<?php

include '../component/connection.php';

session_start();

$username = $_SESSION['name'];

if(!isset($username)){
   header('location:admin_login.php');
};

if(isset($_POST['submit'])){
   $name= $_POST['name'];
   $amount= $_POST['amount'];
   
   $image_name = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
   move_uploaded_file($image_tmp, "../uploads/" . $image_name);
 
 $sql="INSERT INTO `products`(`name`, `amount`,`image`) 
 VALUES ('$name','$amount','$image_name')";
 
 $result=$conn->query($sql);
 
 if($result){
   echo "<script type=\"text/javascript\">
   alert(\"Data Inserted Successfully\");
   window.location = \"products.php\"
   </script>";
 }
 
 }
if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploads/'.$fetch_delete_image['image']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   header('location:products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../component/admin_header.php' ?>

<!-- add products section starts  -->

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box">
      <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="amount" onkeypress="if(this.value.length == 10) return false;" class="box">

      <input type="file" name="image" class="box" required>
      <input type="submit" value="add product" name="submit" class="btn">
   </form>

</section>

<!-- add products section ends -->

<!-- show products section starts  -->

<section class="show-products" style="padding-top: 0;">

   <div class="box-container">

   <?php
     
            $sql = "SELECT * FROM products";
             $result = $conn->query($sql);
                   $i=1;

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
               ?>  
   <div class="box">
       <img src="../uploads/<?php echo $row['image']; ?>" alt="">
      <div class="flex">
         <div class="price"><span>$</span><?= $row['amount']; ?><span>/-</span></div>
      </div>
      <div class="name"><?= $row['name']; ?></div>
      <div class="flex-btn">
         <a href="update_product.php?update=<?= $row['id']; ?>" class="option-btn">update</a>
         <a href="products.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>

   </div>

</section>

<!-- show products section ends -->










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>