<?php 
  
  include "db/connect.php";
  
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $sql="delete from products where id=$id";
    $result=$connect->query($sql);
    if($result){
        echo "<script>alert('Xóa thành công')</script>";
        echo "<script>window.location.href='?option=product-list'</script>";
    }else{
      echo 'that bai';
    }
  
 
  }
  
?>