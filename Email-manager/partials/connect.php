<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "emaildb";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
	die("connection lost - ".mysqli_connect_error());
}

?>