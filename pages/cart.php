<?php 
   
   include "db/connect.php";

   if(isset($_GET['id'])){
     $id=$_GET['id'];
     
   }  
   $qty=isset($_GET['qty']) ? $_GET['qty'] : 1;
   echo $qty;
  
   $product=$connect->query("select * from products where id=$id");
   $productItem=mysqli_fetch_array($product, MYSQLI_ASSOC);

   $item=[
     'id'=>$productItem['id'],
     'name'=>$productItem['name'],
     'image'=>$productItem['image'],
     'price'=>$productItem['price'],
     'qty'=> 1
   ];
   
   if(isset($_SESSION['cart'][$id])){
     $_SESSION['cart'][$id]['qty']+=$qty;
   }else{
     $_SESSION['cart'][$id]=$item;
   }
   $action=isset($_GET['action']) ? $_GET['action'] : "";
   if($action=='update'){
    $_SESSION['cart'][$id]['qty']=$qty;
   }
   if($action=='remove'){
    unset($_SESSION['cart'][$id]);
   }
   header("location:?option=view-cart");
  

?>