<?php 
 include "db/connect.php";
$sql = "SELECT COUNT(*) AS totalMembers FROM member";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$totalMembers = $row['totalMembers'];


?>