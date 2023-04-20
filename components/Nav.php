<?php include "./db/connect.php"; ?>
<?php

include "./db/connect.php";
ob_start(); // bắt đầu bộ đệm đầu ra
$sql = "select * from categories where status = 1";
$result = $connect->query($sql);


?>

<div class="w-[1170px] mx-auto leading-[50px]">
    <ul class="flex align-center">
        <li class="dropdown bg-[#a90d0d] h-[50px] leading-[50px] relative">
            <span class="text-[18px] text-white ml-[20px]"><i class="fa-solid fa-bars"></i></span>
            <a href="" class="px-[20px] text-white text-[18px] pl-[10px] ">Danh mục
                sản
                phẩm</a>
            <ul
                class="submenu absolute top-[50px]  left-[15px] w-[250px] h-auto ml-[-15px] bg-white z-100 opacity-0 invisible">
                <?php
              foreach($result as $item): ?>
                <li class="px-[10px]"><a href="?option=product&id=<?php if(isset($item)) echo $item['id'] ?>"
                        class="text-black-600"><?=urldecode($item['name'])?></a></li>
                <?php endforeach ; ?>
            </ul>
        </li>


        <li><a href=" ?option=home" class="text-white text-[18px] px-[25px]">Trang chủ</a></li>
        <li><a href="" class="text-white text-[18px] px-[25px]">Giới thiệu</a></li>
        <li><a href="" class="text-white text-[18px] px-[25px]">Kênh tạp hóa</a></li>
        <li><a href="" class="text-white text-[18px] px-[25px]">Tin tức</a></li>
        <li><a href="" class="text-white text-[18px] px-[25px]">Liên hệ</a></li>
        <li><a href="?option=view-cart" class="text-white text-[18px] px-[25px]">Giỏ hàng</a></li>
    </ul>
</div>
<style>
.dropdown:hover .submenu {
    visibility: visible;
    opacity: 1;
}

/* hide the submenu by default */
.submenu {
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s, opacity 0.5s ease;
    z-index: 99999;

}

.submenu li:hover {
    background-color: green;
    transition: all 0.3s ease;
}

.submenu li {
    position: relative;
    padding-right: 20px;
}

.submenu li:hover::after {
    content: "";
    display: block;
    position: absolute;
    top: 50%;
    right: -49px;
    transform: translateY(-50%);
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-left: 25px solid green;
    border-right: 25px solid transparent;
    transition: all 0.3s ease;
}

.submenu li a {
    font-size: 18px;
}

.submenu li:hover a {
    color: wheat;

}

.submenu li::before {
    content: "";
    display: block;
    position: absolute;
    top: 50%;
    right: -49px;
    transform: translateY(-50%);
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-left: 25px solid transparent;
    border-right: 25px solid transparent;
}

.dropdown .submenu li::before,
.dropdown:hover .submenu li::before {
    display: none;
}
</style>