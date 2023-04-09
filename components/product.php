<?php 
  include "./db/connect.php";
  
  $sql = "SELECT * FROM products WHERE status = 1";
  $option="home";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql .= " AND cateId = $id";
    $option="product&id=".$id;
  } else if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql .= " AND name LIKE '%$search%'";
    $option="product&search=".$_GET['search'];
  }
  $page=isset($_GET['page']) ? $_GET['page'] : 1;
  
  $perpage=6;
  $from=($page-1)*$perpage;
  $sql.=" limit $from,$perpage";
  
  

  $sqlOld="select * from products where status=1";
  $kq=$connect->query($sqlOld);
  $totalRows = mysqli_num_rows($kq);
  $totalPage=ceil($totalRows/$perpage);

  

  $result = $connect->query($sql);
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
<div>
    <?php for($i=1;$i<=$totalPage;$i++) :?>
    <a class="<?= empty($_GET['page']) && $i==1 || ($page==$i) ? "active" : "" ?>"
        href="?option=<?= $option ?>&page=<?= $i ?>"><?= $i ?></a>
    <?php endfor ; ?>
</div>
<style>
.active {
    width: 20px;
    height: 20px;
    background-color: red;
    color: white;
}
</style>