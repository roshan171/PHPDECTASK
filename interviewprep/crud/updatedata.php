<?php

include "config.php";
$id=$_GET['id'];

if(isset($_POST['Update'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];

  $sql="UPDATE `usersss` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE id=$id";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo "<script> 
    alert('Data Updated successfully');
    window.location='index.php';
    </script>";
  }
}

$sql="SELECT * FROM `usersss`";
$result=mysqli_query($conn,$sql);

$data=mysqli_fetch_assoc($result);


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
    <h3 class="text-center">update Users</h3>
    </div>
    
<div class="container">

    <form action="" method="post">
        <input type="hidden" name="userid" id="id" value="<?php echo $data['id'];?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  name="name" value="<?php echo $data['name'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="email" value="<?php echo $data['email'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $data['phone'];?>">
  </div>
 
  <button type="submit" class="btn btn-primary" name="Update">Update</button>
</form>
</div>
</div>    
</div>
    
</body>
</html>