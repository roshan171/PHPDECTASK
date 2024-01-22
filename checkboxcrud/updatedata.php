<?php
include 'config.php';

$idd=$_GET['id'];

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $status=implode(",",$_POST['status']);
    $gender=$_POST['gender'];

    $sql="UPDATE `crudddimg` SET `id`='$idd',`name`='$name',`email`='$email',`gender`='$gender',`status`='$status' WHERE id='$idd'";
;
$result=$conn->query($sql);

if($result){
    echo "Updated successfully";
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
    <?php
$idd=$_GET['id'];

$sql="SELECT * FROM  crudddimg where id='$idd'";
$result=mysqli_query($conn,$sql);

$data=mysqli_fetch_assoc($result);
$check= $data['status'];
$chk = explode(",",$check);



?>
   <div class="card-body">
   <form action="" method="post" entype="Multipart/form-data">
    <input type="hidden" name="userid" id="id" value="<?php echo $data['id'];?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Name </label>
    <input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $data['email'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status:</label>
   Active: <input type="checkbox" class="form-group" name="status[]" value="Active" <?php if(in_array('Active',$chk)){
    echo 'Checked';
   }    ?>>

   Pending <input type="checkbox" class="form-group" name="status[]" value="Pending" <?php  if(in_array('Pending',$chk)){
    echo "checked";
   } ?>>

  Cancelled:  <input type="checkbox" class="form-group" name="status[]" value="Cancelled" <?php if(in_array('Cancelled',$chk)){
    echo "checked";
  }?>>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Gender:</label>
   Male: <input type="radio" class="form-group" name="gender" value="male"
   <?php
   if($data['gender']=='male'){
    echo "checked";
   }
   ?>>
    Female: <input type="radio" class="form-group" name="gender" value="female"
    <?php
   if($data['gender']=='female'){
    echo "checked";
   }
   ?>>
  </div>



  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
   </div>
  
    </div>
  

    
</body>
</html>