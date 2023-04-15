<?php 
  
  include "db/connect.php";
  
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="delete from products where id=$id";
    $connect->query($sql);
    
  
  header("location:?option=list-product");
  }
  
?>