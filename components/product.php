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
 
  

  $result = $connect->query($sql);
?>

<div class="w-[1170px] mx-auto bg-white">

    <div class="grid grid-cols-4 gap-4  ">
        <?php foreach($result as $item) : ?>
        <div
            class="relative border  border-black-300  overflow-hidden h-[400px] shadow-sm transition duration-500 hover:shadow-md">
            <div class="flex justify-center items-center">
                <a href="?option=productDetail&id=<?=$item['id']?>" class="block">
                    <img src="images/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="w-[200px] h-[150px] ">
                </a>
                <div class="hinh z-1"></div>
            </div>
            <button class="button-buy1 absolute bottom-[60px] right-[24px] ">
                <a href="?option=productDetail&id=<?=$item['id']?>">Xem chi tiết</a>
            </button>
            <button class="button-buy absolute bottom-[60px] right-[24px] opacity-0 z-2">
                <a href="?option=cart&id=<?=$item['id']?>">Mua ngay</a>
            </button>
            <div class="p-4">
                <p class="font-medium text-lg text-gray-900"><?= $item['name'] ?></p>
                <p class="text-gray-600 text-base"><?= $item['description'] ?></p>
                <p class="font-bold text-lg mt-4">$<?= $item['price'] ?></p>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

<style>
.button-buy {
    background-color: #dc2626;
    color: #fff;
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 0.25rem;
    transform: translateY(100%);
    transition: transform 0.3s ease-in-out;
    transition-delay: 0.3s;
}

.button-buy1 {
    background-color: #26afdc;
    color: #fff;

    border: none;
    position: absolute;
    bottom: 58px;
    left: 16px;
    width: 107px;
    height: 42px;
    border-radius: 5px;
}


.relative:hover .button-buy {
    transform: translateY(0%);
    opacity: 1;

}



.relative {
    position: relative;
}

.hinh {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;

    background: rgba(117, 206, 113, 0.2);
    /* Độ mờ của màu đen */
    opacity: 0;
    /* Không hiển thị ban đầu */

    transition: opacity 0.2s ease-in-out;
    transition-delay: 0.2s;
    /* Thêm hiệu ứng khi hover */
}

.relative:hover .hinh {
    opacity: 1;
    /* Hiển thị khi hover */
}

.relative:hover img {
    scale: 1.2;
}

.grid {
    margin-top: 2rem;
    margin-bottom: 2rem;
}
</style>