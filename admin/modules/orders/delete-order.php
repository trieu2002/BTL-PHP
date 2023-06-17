<?php 
  
  include "db/connect.php";
  
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="delete from orders where id=$id";
    $result=$connect->query($sql);
    
    if($result){
      echo "<script>alert('Xóa Đơn hàng thành công!');window.location.href='?option=list-orders';</script>";
    }
  }
  
?>