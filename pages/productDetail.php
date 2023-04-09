<?php include "./db/connect.php"; ?>
<?php 
  if(isset($_POST['content'])) :
     $content=$_POST['content'];
     
     if(isset($_SESSION['member'])):
          $productId=$_GET['id'];
          $memberId=mysqli_fetch_array($connect->query("select * from member where username='".$_SESSION['member']."'"));
          $memberId=$memberId['id'];
          echo $content.$productId.$memberId;
          $sql="INSERT INTO comments (memberId, productId, date, content) VALUES ($memberId, $productId, now(), '$content')";
          $connect->query($sql);
       
     endif;
  endif;

?>
<?php 
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from products where id=$id";
    $result=$connect->query($sql);
    $productSingle=mysqli_fetch_array($result);
  }

?>

<?php foreach($result as $item) : ?>
<div class="border border-black-300">

    <img src="images/<?= $item['image'] ?>" class="w-[200px] h-[200px]" alt="">
    <p>Tien : <?= $item['price'] ?></p>
    <button class="border border-black">Add to cart</button>
</div>
<?php endforeach; ?>
<div>
    <h2>Comments</h2>
    <?php
    if(isset($_GET['id'])){
        $productId=$_GET['id'];
        $comment=$connect->query("select * from member a join comments
        b on a.id=b.memberId join products c on b.productId=c.id where productId=$productId");
        if(mysqli_num_rows($comment)==0):
          echo "<h1?>No Comment!</h1>";
    else:
    foreach($comment as $item): ?>

    <h2><?=$item['username']?></h2>
    <h2><?=$item['date']?></h2>
    <h2><?=$item['content']?></h2>
    <?php endforeach;
       endif;
    }

    ?>
    <form method="post">
        <textarea class="border border-black" name="content" id="" cols="30" rows="10"></textarea> <br> <br>
        <button type="submit" class="border border-black">Bình luận</button>
    </form>
</div>