<?php
include 'config.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $status=implode(",",$_POST['status']);
    $gender=$_POST['gender'];

    $sql="insert into crudddimg (`name`,`email`,`status`,`gender`)values('$name','$email','$status','$gender')"
;
$result=$conn->query($sql);

if($result){
    echo "inserted successfully";
}

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
</head>
<body>

<div class="container mt-3">
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-4">
            <h2 class="mt-2 text-center card-title">Add User Dtails</h2>
            </div>
            <div class="col-sm-8">
            <a href="index.php" class="btn btn-info" style="float:right;">Back</a>
            </div>
        </div>
    </div>
   <div class="card-body">
   <form action="" method="post" entype="Multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name </label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status:</label>
   Active: <input type="checkbox" class="form-group" name="status[]" value="Active">
   Pending <input type="checkbox" class="form-group" name="status[]" value="Pending">
  Cancelled:  <input type="checkbox" class="form-group" name="status[]" value="Cancelled">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Gender:</label>
   Male: <input type="radio" class="form-group" name="gender" value="male">
    Female: <input type="radio" class="form-group" name="gender" value="female">
  </div>



  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
   </div>
  
    </div>
  

    
</body>
</html>