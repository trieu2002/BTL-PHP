<?php 
  
  include "db/connect.php";
  
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="delete from comments where id=$id";
    $result=$connect->query($sql);
    
    if($result){
      echo "<script>alert('Xóa bình luận thành công!');window.location.href='?option=list-comment';</script>";
    }
  }
  
?>