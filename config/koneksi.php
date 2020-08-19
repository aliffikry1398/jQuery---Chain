<?php  

$server = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'js_chain';

$conn = mysqli_connect($server,$user,$pass,$db);

if ($conn->connect_errno) {
  die("Connection failed". $conn->connect_error);
}

?>