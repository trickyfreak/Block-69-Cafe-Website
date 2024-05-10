<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "block69cafe";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>