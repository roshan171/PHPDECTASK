<?php

include "config.php";

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];

  $sql="INSERT INTO `usersss`(`name`,`email`,`phone`)VALUES ('$name','$email','$phone')";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo "<script> 
    alert('Data Inserted successfully');
    window.location='index.php';
    </script>";
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">

<div class="card shadow">
    <div class="card-title">
    <h3 class="text-center">Add Users</h3>
    </div>
    
<div class="container">

    <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
  </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
</div>    
</div>
    
</body>
</html>