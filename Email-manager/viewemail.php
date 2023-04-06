<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true) {
  
}

function fileExtension($s) {
  $n = strrpos($s,".");
   
  if($n===false) 
    return "";
  else
    return substr($s,$n+1);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/viewemail.css">
</head>
<body>
<div class="container">
<div class="email-app mb-4">
    <nav>
      <?php require "compose.php"?>
      
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fa fa-inbox"></i> Inbox 
            <span class="badge text-bg-dark">4</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sentemail.php"><i class="fa fa-rocket"></i> Sent</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="draftemail.php"><i class=" fa fa-external-link"></i> drafts <span class="badge text-bg-warning">10</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="trash.php"><i class="fa fa-trash-o"></i> Trash</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fa fa-bookmark"></i>Logout</a>
        </li>
      </ul>
    </nav>
    <main class="message">
      <div class="toolbar">
        <div class="btn-group">
          <button type="button" class="btn btn-light">
            <span class="fa fa-star"></span>
          </button>
          <button type="button" class="btn btn-light">
            <span class="fa fa-star-o"></span>
          </button>
          <button type="button" class="btn btn-light">
            <span class="fa fa-bookmark-o"></span>
          </button>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-light">
            <span class="fa fa-mail-reply"></span>
          </button>
          <button type="button" class="btn btn-light">
            <span class="fa fa-mail-reply-all"></span>
          </button>
          <button type="button" class="btn btn-light">
            <span class="fa fa-mail-forward"></span>
          </button>
        </div>
        <button type="button" class="btn btn-light">
          <span class="fa fa-trash-o"></span>
        </button>
        <div class="btn-group dropdown">
            <a class="btn mini all" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fa fa-tags"></span>
                <span class="caret"></span>
                 <i class="fa fa-angle-down "></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#"> Home</a></li>
                <li><a class="dropdown-item" href="#"> Job</a></li>
                <li><a class="dropdown-item" href="#"> News</a></li>
            </ul>
        </div>
      </div>

      <?php
      
      require "partials/connect.php";

      $sno = $_GET['sno'];

      $sql = "SELECT * FROM composetable1 WHERE sno='$sno'";

      $result = mysqli_query($conn , $sql);

      $num = mysqli_num_rows($result);

      if ($num >0){
         while ($row = mysqli_fetch_assoc($result)) {

          $semail = $row['sender'];
          $sql1 = "SELECT name FROM registeruser WHERE email='$semail'";
          $result1 = mysqli_query($conn , $sql1);
          $row1 = mysqli_fetch_assoc($result1);
      
      ?>

      <div class="details">
       <div class="title"><?php echo $row['subject'];?></div>
        <div class="header">
          <img class="avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
          <div class="from">
            <span><?php echo ucwords($row1['name']);?></span>
                  <?php echo $row['sender'];?><br>
                  <?php echo "to :" . "&nbsp" .$row['receiver'];?> <?php echo "&nbsp" .$row['cc'];?>
          </div>
          <div class="date"><b><?php echo $row['date'];?></b></div>
        </div>
        <div class="content">
          <p>
            <?php echo $row['message'];?>
          </p>
        </div>

       
        <div class="attachments">
          <div class="attachment">
            <?php  
            $imgName = $row["attachment"];
            $imgPath = "partials/files/$imgName"; 
            $fileSize = filesize($imgPath); 
            $fileSize = $fileSize * 0.000001; ?>

            <span class="badge text-bg-danger"><?php echo fileExtension($row['attachment']); ?></span> <b><a href="partials/files/<?php echo $row['attachment']; ?>" target="_blank"><?php echo $row['attachment'];?></a></b> &nbsp <i><?php echo number_format((float)$fileSize, 2, '.', '');?>MB</i>
            <span class="menu"> 
              <a href="#" class="fa fa-search"></a>
              <a href="#" class="fa fa-share"></a>
              <a href="#" class="fa fa-cloud-download"></a>
            </span>
          </div>
        </div>

        <?php

        $sno = $_GET['sno'];

        $sql = "SELECT * FROM composetable WHERE sno = '$sno'";

        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          require "partials/connect.php";

          $sender = $_POST['sender'];
          $receiver = $_POST['receiver'];
          $cc = $_POST['cc'];
          $subject = $_POST['subject'];
          $message = $_POST['message'];
          $attachment = $_POST['attachment'];
          $status = $_POST['status'];



          $sql = "INSERT INTO composetable (`sender`, `receiver`, `cc`, `subject`, `message`, `attachment`, `status`) VALUES ('$sender', '$receiver','$cc','$subject', '$message', '$attachment', 1);";

            $sql .= "INSERT INTO composetable1 (`sender`, `receiver`, `cc`, `subject`, `message`, `attachment`, `status`) VALUES ('$sender', '$receiver','$cc','$subject', '$message', '$attachment', 1)";

          $result = mysqli_multi_query($conn, $sql);

          if ($result) {
            echo "message sent successfully";
            header ("location: viewemail.php");
          }
        }
    

        ?>
        <form method="post" action="viewemail.php">
          <div class="form-group">
             <input type="hidden" name="receiver" value="<?php echo $row['sender'];?>">
            <input type="hidden" name="sender" value="<?php echo $_SESSION['email'];?>">
            <textarea class="form-control" id="message" name="message" rows="10" placeholder="Click here to reply"></textarea>
          </div>
          <div class="form-group" style="margin-top: 10px;">
            <input type="submit" tabindex="3" class="btn btn-success" value="Send message">
          </div>
        </form>
      </div>
    </main>
  </div>
  </div>

   <?php
      }
    }
  }
      ?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>