<?php 
  if(isset($_SESSION['member'])){
    unset($_SESSION['member']);
    header("location:?option=home");
    exit;
  }
?>