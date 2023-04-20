<?php 
   
   include "db/connect.php";

   if(isset($_GET['id'])){
     $id=$_GET['id'];
     
   }

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
     $_SESSION['cart'][$id]['qty']+=1;
   }else{
     $_SESSION['cart'][$id]=$item;
   }

   header("location:?option=view-cart");

?>