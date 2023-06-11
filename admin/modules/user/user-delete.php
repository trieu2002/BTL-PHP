<?php 
  include "db/connect.php";
  if(isset($_GET['id'])){
    $id=$_GET['id'];
 
    $sql="delete from member where id=$id";
    $result=$connect->query($sql);
  }
  if($result){
    echo "<script>alert('Xóa thành viên thành công!');window.location.href='?option=list-user';</script>";
  }
?>