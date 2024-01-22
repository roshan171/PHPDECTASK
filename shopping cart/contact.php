
<?php 
include 'config.php';

if(isset($_POST['contact'])){
    $name= $_POST['name'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $message= $_POST['message'];

    $sql ="Insert into contact (name,phone,email,message) VALUES('$name','$phone','$email','$message')";
    $result= mysqli_query($conn,$sql);
    if($result){
       echo  "<script>
       alert( 'Thank You For Connect With Us..');
       </script>" ;
    }
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Contact Form</h1>

   <form action="" method="post">


      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your Phone</span>
            <input type="number" placeholder="enter your number" name="phone" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Message</span>
           <input type="text" name="message" id="" placeholder="enter your Message" required></textarea>
         </div>

  
    
      </div>
      <input type="submit" value="Submit" name="contact" class="btn">
   </form>

</section>

</div>


<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>