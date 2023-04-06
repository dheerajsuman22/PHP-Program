<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" ){
	require "partials/connect.php";

	 $sender = ($_POST['sender']);
	 $receiver = ($_POST['receiver']);
	 $cc = ($_POST['cc']);
	 $subject = ($_POST['subject']);
	 $message = ($_POST['message']);
	 
   if (isset($_FILES['attachment'])) {
     $errors = array();

     $file_name = $_FILES['attachment']['name'];
     $file_size = $_FILES['attachment']['size'];
     $file_tmp = $_FILES['attachment']['tmp_name'];
     $file_type = $_FILES['attachment']['type'];
     $exp = explode('.', $file_name);
     $file_ext = end($exp);

     $extenstions = array("jpeg","jpg","png","pdf","docs","zip","txt");

     if (in_array($file_ext,$extenstions) === false) {
       $errors[] = "this extenstions file are not allowed please select jpeg, jpg, png, pdf, docs, zip, txt";
     }

     if ($file_size > 20097152) {
       $errors[] = "file size must be 20mb or lower";
     }

     $new_name = basename($file_name);
     $target = "partials/files/".$new_name;

     if (empty($errors) == true) {
       move_uploaded_file($file_tmp, $target);
     }else{
      echo "errors";
     }
   }
   

	 $sql = "INSERT INTO composetable (`sender`, `receiver`, `cc`, `subject`, `message`, `attachment`,`status`) VALUES ('$sender', '$receiver', '$cc', '$subject', '$message', '$new_name', 1);";

   $sql .= "INSERT INTO composetable1 (`sender`, `receiver`, `cc`, `subject`, `message`, `attachment`,`status`) VALUES ('$sender', '$receiver', '$cc', '$subject', '$message', '$new_name', 1)";

	 $result = mysqli_multi_query($conn, $sql);

	 if ($result) {
	 	echo "message sent successfully";
	 	header ("location: index.php");
	 }
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
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

<div class="compose" style="text-align: center; margin-top: 20px; margin-bottom: 20px; ">
<button type="button" style="width:280px; height: 45px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Compose</button>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Compose</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="compose.php" method="post" enctype="multipart/form-data">

        	<input type="hidden" name="sender" value="<?php echo $_SESSION['email'];?>">

          <div class="mb-3 row">
            <div class="col-lg-2">
            <label for="recipient-name" class="col-form-label">To:</label>
            </div>
            <div class="col-lg-10">
            <input type="email" name="receiver" class="form-control" id="recipient-name">
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col-lg-2">
               <label for="message-text" class="col-form-label">CC/BCC:</label>
            </div>
            <div class="col-lg-10">
               <input type="email" name="cc" class="form-control" id="message-text">
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col-lg-2">
               <label for="message-text" class="col-form-label">Subject:</label>
            </div>
            <div class="col-lg-10">
                <input type="text" name="subject" class="form-control" id="message-text">
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col-lg-2">
            <label for="message-text" class="col-form-label">Message:</label>
          </div>
          <div class="col-lg-10">
            <textarea class="form-control" name="message" id="message-text" cols="0" rows="6"></textarea>
          </div>
          </div>
          <div class="mb-3 row">
            <div class="col-lg-2">
              <label for="message-text" class="col-form-label">File:</label>
            </div>
            <div class="col-lg-10">
               <input type="file" name="attachment" class="form-control" id="message-text">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Send message">
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>          
</body>
</html>