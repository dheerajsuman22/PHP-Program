<?php 

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true) { 
    
}

require "partials/connect.php";

$sno = $_GET['sno'];

$sql = "UPDATE composetable1 SET status='0' WHERE sno='$sno'";
$result = mysqli_query($conn,$sql);
if ($result) {
   header("location:sentemail.php");
}

?>
