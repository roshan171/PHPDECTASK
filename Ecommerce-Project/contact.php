<?php 
include 'component/connection.php'; 

session_start();

if(isset($_SESSION['id'])){
   $id = $_SESSION['id'];
}else{
   $id = '';
};


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];

    $sql="INSERT INTO `message`(  `name`, `email`, `phone`, `message`) 
    VALUES ('$name','$email','$phone','$message')";

$result=$conn->query($sql);

if($result){
  echo "<script type=\"text/javascript\">
  alert(\"Message Sent Successfully\");
  window.location = \"index.php\"
  </script>";
}
}




?>

