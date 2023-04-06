 <?php

require 'partials/connect.php';

$sno = $_GET["sno"];

$sql = "DELETE FROM composetable WHERE sno = '$sno'";
$result1 = mysqli_query($conn, $sql);

if($result1){
  echo "string";
  header("location: trash.php");

}else{
  echo "query faild";
}

?>