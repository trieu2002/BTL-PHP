<?php include "./db/connect.php"; ?>
<?php
   if($_GET['id']){
    $id=$_GET['id'];
    $sql="select * from products where status=1 and saleId=$id";
    $result=$connect->query($sql);
   }
?>
<div class="grid grid-cols-4">
    <?php foreach($result as $item) : ?>
    <div class="border border-black-300">
        <a href="?option=productDetail&id=<?=$item['id']?>">
            <img src="images/<?= $item['image'] ?>" alt=""></a>
        <p>Tien : <?= $item['price'] ?></p>
    </div>
    <?php endforeach; ?>
</div>