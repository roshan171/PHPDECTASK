
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
  $con=mysqli_connect("localhost", "root", "", "foodwebsite");
if(isset($_POST['submit'])){
  session_start();
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // if($con){ echo "1"; } else{ echo "2";}
  $chk=mysqli_fetch_array(mysqli_query($con,"select count(*) as cn from `users` where `username`='$user' and `password`='$pass'"));
  // print_r($chk);
  //$user="koushaljs@gmail.com";
  //$pass='Kous@3636';
  //  if($username==$user && $password == $pass){
  if($chk['cn']>0){
      // echo $password . $pass;
      
      $_SESSION['username'] = $user;
      $_SESSION['loggedIn'] = true;
      echo "<script>window.location ='index.php';</script>";
      //header("Location: https://lemonmode.com/admin/index.php");
      
    
  }else{
    // echo "Username and password wrong....";
    echo "<script type=\"text/javascript\">
    alert(\"Username and password wrong....\");
    window.location = \"login.php\"
    </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="css/login.css"> -->
</head>
<body>
<div class="container">
  <div class="card">
    <h2>Login Form</h2>
    <form action="" method="POST">
      <label for="username">Username</label>
      <input type="text" id="username" placeholder="Enter your username" name="username">

      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Enter your password" name="password">

      <button type="submit" id="submit" name="submit">Login</button>
    </form>
    <div class="switch">Don't have an account? <a href="register.php" onclick="switchCard()">Register here</a></div>
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