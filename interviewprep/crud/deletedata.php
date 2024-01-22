<?php
include "config.php";

$id=$_GET['id'];

$sql="DELETE FROM `usersss` where id=$id";
$result=mysqli_query($conn,$sql);

if($result){
    echo "<script> 
    alert('Data Deleted successfully');
     window.location='index.php';
    </script>";
  }


?>