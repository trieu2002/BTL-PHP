<?php include "./db/connect.php"; ?>
<?php  
 $sql="select * from logo";
 $result=$connect->query($sql);
 $logo=mysqli_fetch_array($result);
 
?>
<header class="w-[100%] my-[10px] flex py-[10px] align-center">
    <div class="py-[10px] w-[25%]">
        <div>
            <a href="?option=home">
                <img src="images/<?=$logo['images']?>" class="max-w-[155px]" alt="">
            </a>
        </div>
    </div>
    <div class="w-[41.66666667%] px-[15px]">
        <div class="my-[12px] w-[100%] block relative">
            <form action="" method="get" class="w-[100%]">
                <input type="hidden" name="option" value="product">
                <input type="text"
                    class="w-[100%]  h-[40px]  border border-green-500 placeholder:pl-[10px] outline-none hover:outline-none"
                    placeholder="Tìm Kiếm" name="search">
                <span class="w-[1%]  p-[0px]">
                    <button type="submit"
                        class="bg-green-500 border border-green-500 border-solid text-white h-[40px] px-[20px] absolute">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </span>

            </form>
        </div>

    </div>
    <div class="w-[33.33333333%] flex justify-end align-center">
        <div class="mr-[20px] mt-[10px] flex w-[50%]">
            <div class="w-[35%] text-green-500 text-[35px]">
                <i class="fa-solid fa-phone-volume"></i>
            </div>
            <div>
                <p>Đặt hàng nhanh</p>
                <a href="" class="text-black font-bold">0364323560</a>
            </div>
        </div>
        <div class="relative mt-[10px] relative">
            <span class="w-[30%] text-[25px] text-green-500"> <i class="fa-solid fa-cart-shopping"></i></span>
            <span
                class="absolute right-[-3px] w-[20px] h-[20px] bg-orange-600 rounded-[100%] text-white leading-[20px] text-center">0</span>
        </div>
    </div>
</header>