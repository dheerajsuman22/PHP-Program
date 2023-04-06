<?php
$loggedin = false;
$showError = false;
$showAlert = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   require "partials/connect.php";

   $email = ($_POST['email']);
   $password = ($_POST['password']);

   $sql = "SELECT * FROM registeruser WHERE email= '$email'";
   $result = mysqli_query($conn, $sql);
   $num = mysqli_num_rows($result);

   if ($num = 1) {
     while ($row = mysqli_fetch_assoc($result)) {
       if (md5($password) == $row['password']) {
         $loggedin = true;

         $name = $row['name'];

         session_start();
         $_SESSION['loggedin'] = true;
         $_SESSION['email'] = $email;
         $_SESSION['name'] = $name;
         header("location: index.php");
       }
       else{
        $showError = true;
       }
     }
   }
   else{
    $showAlert = true;
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>

  <?php if($showAlert){ echo
'<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>data is not found!!!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

 if($showError){ echo
'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Warning!!! Invalid username or password...</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

?>

<div class="container">
  <div class="container-wrapper">

      <h3 class="login-text"><i class="bi bi-person-circle ac-logo"></i>Login</h3>
  
      <form method="post" action="login.php">
           
          <div class="item"><input class="input" type="email" name= "email" placeholder="Email"></div> 
          <div class="item"><input class="input" type="password" name= "password" placeholder="Password"></div>
          <span class="remember"> <a href="#">Forgot Password?</a></span>

          <div class="item submit"><button type="submit">Submit</button></div>
      </form>
      <h2><span>OR</span></h2>
   
      <div class="social-media">

          <a href="#"><div class="icons8-google social-mediaImg"></div></a> 
          <a href="#"><div class="icons8-facebook-circled social-mediaImg"></div></a> 
          <a href="#"><div class="icons8-twitter social-mediaImg"></div></a> 

      </div>
      <span class="ac">Don't have an Account?<a href="signup.php">Sign Up</a></span>
  </div>

</div>

</body>
</html>