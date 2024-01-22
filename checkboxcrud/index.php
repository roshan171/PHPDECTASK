<?php

include "config.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
</head>
<body>
    

<div class="container">
    <h3 class="text-center mt-2">Crud Application</h3>

    <a href="adddata.php" class="btn btn-primary">Add User</a>

    <table class="table mt-3 ">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">name</th>
      <th scope="col">Email</th>
      <th scope="col">status</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
$sql = "select * from crudddimg";
$res=$conn->query($sql);
$i=1;

?>
<?php
while($data=mysqli_fetch_assoc($res)) {

?>
    <tr></tr>
    <td><?php echo $i++;?></td>
    <td><?php echo $data['name'];?></td>
    <td><?php echo $data['email'];?></td>
    <td><?php echo $data['status'];?></td>
    <td><?php echo $data['gender'];?></td>
    <td class="action">
<a href="updatedata.php?id=<?php echo $data['id']?>" class="btn btn-success">Edit</a>
<a href="deletedata.php?id=<?php echo $data['id']?>" class="btn btn-danger">delete</a>
    </td>
    <?php }?>
  </tbody>

</table>
</div>




















<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>