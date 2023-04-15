<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$db="php-haui";

// Create connection
$connect = new MySQLi($servername, $username, $password,$db);

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>