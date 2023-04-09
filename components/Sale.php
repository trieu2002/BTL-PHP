<?php include "./db/connect.php"; ?>
<?php 
 $sql="select * from imagesale where status=1";
 $result=$connect->query($sql);
 
?>

<div class="w-[100%] mt-[20px] mb-[20px]">
    <div class="grid grid-cols-3 gap-8">
        <?php foreach($result as $item) : ?>
        <div>
            <a href="?option=productSale&id=<?=$item['id'] ?>">
                <img src="images/<?= $item['image'] ?>" alt="">
            </a>
        </div>
        <?php endforeach ; ?>
    </div>
</div>