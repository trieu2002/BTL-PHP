<?php
include "./db/connect.php";

$sql = "SELECT COUNT(*) AS total FROM products";
$result = $connect->query($sql);
$row = $result->fetch_assoc();

$totalProducts = $row['total'];

$sql1 = "SELECT COUNT(*) AS total1 FROM categories";
$result1 = $connect->query($sql1);
$row1 = $result1->fetch_assoc();

$totalProducts1 = $row1['total1'];
$sql2 = "SELECT COUNT(*) AS total2 FROM comments";
$result1 = $connect->query($sql2);
$row2 = $result1->fetch_assoc();

$totalProducts2 = $row2['total2'];
$sql3 = "SELECT COUNT(*) AS total3 FROM member";
$result3 = $connect->query($sql3);
$row3 = $result3->fetch_assoc();

$totalProducts3 = $row3['total3'];
$sql4 = "SELECT COUNT(*) AS total4 FROM orders";
$result4 = $connect->query($sql4);
$row4 = $result4->fetch_assoc();

$totalProducts4 = $row4['total4'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="w-[100%]  py-[20px] ">
        <div class="grid grid-cols-4 gap-8 px-[50px]">
            <div class="h-[200px] bg-orange-300 rounded-[10px] text-center leading-[200px]">
                <span class="text-[20px]">Số sản phẩm :</span>
                <span class="text-[20px] "><?=$totalProducts?></span>
            </div>
            <div class="h-[200px] bg-blue-300 rounded-[10px] text-center leading-[200px]">
                <span class="text-[20px]">Số danh mục sản phẩm :</span><span><?=$totalProducts1?></span>
            </div>
            <div class="h-[200px] bg-pink-300 rounded-[10px] text-center leading-[200px]">
                <span class="text-[20px]">Số bình luận:</span> <span><?=$totalProducts2?></span>
            </div>
            <div class="h-[200px] bg-yellow-300 rounded-[10px] text-center leading-[200px]">
                <span class="text-[20px]">Số tài khoản user :</span> <span><?=$totalProducts3?></span>
            </div>
            <div class="h-[200px] bg-green-500 rounded-[10px] text-center leading-[200px]">
                <span class="text-[20px]">Số đơn hàng :</span> <span><?=$totalProducts4?></span>
            </div>
        </div>
    </div>
</body>

</html>