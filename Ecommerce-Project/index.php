
<?php


include 'component/connection.php';

session_start();


$username= $_SESSION['username'];

if(!isset($username)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['name'];
    $product_price = $_POST['amount'];
    $product_image = $_POST['image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
       $message[] = 'product added to cart succesfully';
    }
 
 }
 



?>

<?php include 'Component/user_header.php'; ?>

<section data-bs-version="5.1" class="header1 cid-t9FADIgQhP" id="aheader1-1">


    
    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(255, 255, 255);"></div>

    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-lg-6">
                <h1 class="mbr-section-title mbr-fonts-style mb-0 align-center display-2"><strong>Kitchen Supplies &amp; Wares</strong></h1>
                
                <p class="mbr-text mbr-fonts-style align-center mt-3 mb-0 display-4">
                    Facilisis magna etiam tempor orci eu lobortis elementum nibh tellus.
                    Eget arcu dictum varius duis at consectetur.</p>
                <div class="mbr-section-btn align-center mt-3"><a class="btn btn-black display-7" href="product.php">SHOP NOW</a></div>
            </div>
        </div>
    </div>
</section>

<!-- About us -->

<section data-bs-version="5.1" class="gallery1 cid-t9FCV4jwfB" id="about">
    
    
    <div class="container">
        <div class="row">
        <div class="col-12 col-title">
        <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-5"><strong>About Us</strong></h3>
                
            </div>
            <p class="text-center" style="font-size:25px;">‘Vasundhara’ menu includes crisp, tasty, custom-made Middle Eastern eats and an All-American charge. Our food is solid and yummy. We offer a broad vegetarian menu and have sans gluten choices upon demand.

We are likewise a shelled nut-free and without dairy foundation. Make a trip and try us out! Or on the other hand have come to you! We offer a few conveyance alternatives, cooking for gatherings everything being equal, and a full administration food truck.It is one of the quickest developing gourmet food trucks and eateries in the United States.</p>
            
        </div>
    
</div>
</section>



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







<section data-bs-version="5.1" class="header1 cid-t9FFLEyXoo" id="aheader1-4">


    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(31, 29, 26);"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-0 align-center display-2"><strong>Neat And Clean Kitchen</strong></h1>
                
                <p class="mbr-text mbr-fonts-style align-center mt-3 mb-0 display-7">
                    Facilisis magna etiam tempor orci eu lobortis elementum nibh tellus.<br>
                    Eget arcu dictum varius duis at consectetur.&nbsp;</p>
                <div class="mbr-section-btn align-center mt-3"><a class="btn btn-white display-7" href="product.php">SHOP NOW</a></div>
            </div>
        </div>
    </div>
</section>




<!-- contact -->

<section data-bs-version="5.1" class="features1 cid-t9FLOJ8yvp" id="contact">
<div class="container">
        <div class="row justify-content-center">
        <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-5"><strong>Connect With Us </strong></h3>
</div>
        <form action="contact.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email:</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Message:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="message">
  </div>
  
  <div class="text-center">
  <button type="submit" class="btn btn-primary " name="submit" style=" margin-left: 42%;">Submit</button>
  </div>
 
</form>



</div>
    
</section>




<!-- map -->

<section data-bs-version="5.1" class="image1 cid-t9FLpJ814D" id="aimage1-c">
    
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15085.300624947744!2d72.93522585!3d19.0494363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c678224aac05%3A0x2f360c5371ae86c3!2sMankhurd%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1699079147858!5m2!1sen!2sin" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
    

</section>




<?php include 'Component/footer.php';?>
  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

$(".buynow").click(function()
{

var amount=$(this).attr('data-amount');	
var productid=$(this).attr('data-productid');	
var productname=$(this).attr('data-productname');	
	
var options = {
    "key": "rzp_test_858P5RlRtlL0TT", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "name": "Vasundhara",
    "description": productname,
    "image": "images/logo.jpg",
    "handler": function (response){
        var paymentid=response.razorpay_payment_id;
		
		$.ajax({
			url:"payment-process.php",
			type:"POST",
			data:{product_id:productid,payment_id:paymentid},
			success:function(finalresponse)
			{
				if(finalresponse=='done')
				{
					window.location.href="http://localhost/Ecommerce%20Project%20Resume/Ecommerce-Website/success.php";
				}
				else 
				{
					alert('Please check console.log to find error');
					console.log(finalresponse);
				}
			}
		})
        
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
 rzp1.open();
 e.preventDefault();
});
</script>

