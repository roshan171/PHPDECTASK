<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  
  .card {
    width: 300px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
  }
  
  h2 {
    color: #007BFF;
    margin-bottom: 20px;
  }
  
  form {
    display: flex;
    flex-direction: column;
  }
  
  label {
    text-align: left;
    margin-bottom: 5px;
  }
  
  input {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  
  button {
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .switch {
    margin-top: 15px;
    font-size: 14px;
  }
  
  .switch a {
    color: #007BFF;
    text-decoration: none;
  }
  

</style>

<?php
 $conn=mysqli_connect("localhost", "root", "", "foodwebsite");

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $email=$_POST['email'];
    if($password==$confirm_password){
$s="INSERT INTO `users` (`username`, `password`,`confirm_password`,`email`) VALUES 
('$username','$password','$confirm_password','$email')";
// echo $s; 
$sql=mysqli_query($conn,$s);
 if($sql){
        echo "<script>window.location.href ='login.php';</script>";
    }

}
else{
       echo "<script>alert('Confirm Right Password')";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- <link rel="stylesheet" href="css/login.css"> -->
</head>
<body>
<div class="container">
  <div class="card">
    <h2>Register Form</h2>
    <form action="" method="POST">
      <label for="username">Username</label>
      <input type="text" id="username" placeholder="Enter your username" name="username">

      <label for="username">Email</label>
      <input type="text" id="email" placeholder="Enter your Email" name="email">

      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Enter your password" name="password">

      <label for="confirm_password">Confim Password</label>
      <input type="password" id="confirm_password" placeholder="Enter your Confim Password" name="confirm_password">

      <button type="submit" id="submit" name="submit">Register</button>
    </form>
    <div class="switch">Already have an account? <a href="login.php" onclick="switchCard()">Login here</a></div>
  </div>

</div>





<script>
    function switchCard() {
  const loginCard = document.querySelector('.container .card:nth-child(1)');
  const registerCard = document.querySelector('.container .card:nth-child(2)');

  if (loginCard.style.display === 'none') {
    loginCard.style.display = 'block';
    registerCard.style.display = 'none';
  } else {
    loginCard.style.display = 'none';
    registerCard.style.display = 'block';
  }
}

</script>
</body>
</html>