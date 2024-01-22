
<?php


include 'component/connection.php';

session_start();
$username= $_SESSION['username'];

if(!isset($username)){
   header('location:login.php');
}

// if(isset($_SESSION['id'])){
//    $id = $_SESSION['id'];
// }else{
//    $id = '';
// };


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['name'];
   $product_price = $_POST['amount'];
   $product_image = $_POST['image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
    echo "<script> alert('product already added to cart..')</script>";
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, amount, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      echo "<script> alert( 'product added to cart succesfully')</script>";
   }

}


?>

<?php include 'Component/user_header.php'; ?>



<section data-bs-version="5.1" class="gallery1 cid-t9FCV4jwfB" id="Product">
    
    <div class="container">
        <div class="row">
        <div class="col-12 col-title">
        <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-5">
            <strong>Our latest Products</strong></h3>    
         </div>
        
         
   <?php
      $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product)){
   ?>
    <div class="col-3">
    <form method="post" class="box" action="">
         <div class="card" style="width: 18rem;">
  <img src="uploads/<?php echo $fetch_product['image']; ?>" class="card-img-top" alt="..." height="240px">
  <div class="card-body">
    <h4 class=" text-center"><?php echo $fetch_product['name']; ?></h4>
    <h5 class=" text-center"> $<?php echo $fetch_product['amount']; ?>/-</h5>
    <!-- <p class="card-text"><input type="number" min="1" name="quantity" value="1"></p> -->
    <input type="hidden" name="image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="name" value="<?php echo $fetch_product['name']; ?>">
         <input type="hidden" name="amount" value="<?php echo $fetch_product['amount']; ?>">
    <!-- <input type="submit" value="add to cart" name="add_to_cart" class="btn btn-primary"> -->
    <input type="submit" class="btn btn-primary mb-2" value="add to cart" name="add_to_cart" style="width:100%">
    <a href="javascript:void(0)" data-productid="<?php echo $fetch_product['id'];?>"
       data-productname="<?php echo  $fetch_product['name'];?>" data-amount="<?php echo  $fetch_product['amount'];?>"
        class="btn btn-primary buynow">Buy Now</a>
  </div>
</div>
         </form>
</div>

<?php
      };
   };
   ?>

        </div>
    
</div>
</section>






<!-- map -->

<section data-bs-version="5.1" class="image1 cid-t9FLpJ814D" id="aimage1-c">
    
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15085.300624947744!2d72.93522585!3d19.0494363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c678224aac05%3A0x2f360c5371ae86c3!2sMankhurd%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1699079147858!5m2!1sen!2sin" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
    

</section>




<?php include 'Component/footer.php';?>
  


