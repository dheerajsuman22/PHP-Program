<?php
$showalert = false;
$showAlert = false;
$showWarning = false;
$showerror = false;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  require "partials/connect.php";

  $name = ($_POST['name']);
  $email = ($_POST['email']);
  $password = ($_POST['password']);
  $cpassword = ($_POST['cpassword']);

  $sql1 = "SELECT * FROM registeruser WHERE email = '$email'";

  $result1 = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result1)> 0) {
    $showalert = true;
  }
  else{

    if ($name != "" && $email != "" && $password != "" && $cpassword != "") {
      if ($password == $cpassword) {
        $hash = md5($password);
        $sql = "INSERT INTO `registeruser`(`name`, `email`, `password`)
                 VALUES ('$name', '$email', '$hash')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $showAlert = true;
            header("location: login.php");
        }

        }else{
           $showerror = "password did not match";
        }
        
        }else{
          $showWarning = true;
        }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  <title>signup page</title>
</head>
<body>

<?php

 if($showAlert){ echo
'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Form submitted successfully</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

 if($showerror){ echo
'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Warning!!</strong>'.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

 if($showWarning){ echo
'<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Please fill the all field</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

 if($showalert){ echo
'<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>username is already exists..!</strong>
</div>';}

?>

<div class="box">
  <h1>SIGN-UP</h1>
    <form method="post" action="signup.php">    
      <i class="fa fa-user icon" aria-hidden="true"></i>
      <input type="text" name="name" placeholder=" Enter your name"><br>

      <i class="fa fa-envelope icon" aria-hidden="true"></i>
      <input type="email" name="email" placeholder=" Enter your Email"><br/>

      <i class="fa fa-lock icon" aria-hidden="true"></i>
      <input type="password" name="password" placeholder="Enter your password"><br/>

      <i class="fa fa-lock icon" aria-hidden="true"></i>
      <input type="password" name="cpassword" placeholder="Re-enter password">

      <button type="submit">Submit</button>
    </form>
</div>
</body>