<?php

include '../component/connection.php';

session_start();



if(isset($_POST['submit'])){

  $user = $_POST['name'];
  $pass = $_POST['password'];
  $con=mysqli_connect("localhost", "root", "", "foodwebsite");
  // if($con){ echo "1"; } else{ echo "2";}
  $chk=mysqli_fetch_array(mysqli_query($con,"select count(*) as cn from `admin` where `name`='$user' and `password`='$pass'"));
  // print_r($chk);
  //$user="koushaljs@gmail.com";
  //$pass='Kous@3636';
  //  if($username==$user && $password == $pass){
  if($chk['cn']>0){
      // echo $password . $pass;
      
      $_SESSION['name'] = $user;
      $_SESSION['loggedIn'] = true;
      echo "<script>window.location ='dashboard.php';</script>";
      //header("Location: https://lemonmode.com/admin/index.php");
      
    
  }else{
    echo "Username and password wrong....";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- admin login form section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>login now</h3>
      <!-- <p>default username = <span>admin</span> & password = <span>admin123</span></p> -->
      <input type="text" name="name" maxlength="20" required placeholder="enter your username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="password" maxlength="20" required placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" name="submit" class="btn">
   </form>

</section>

<!-- admin login form section ends -->











</body>
</html>