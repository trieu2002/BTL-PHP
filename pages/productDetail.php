<?php include "./db/connect.php"; ?>
<?php 
  if(isset($_POST['content'])) :
     $content=$_POST['content'];
     
     if(isset($_SESSION['member'])):
          $productId=$_GET['id'];
          $memberId=mysqli_fetch_array($connect->query("select * from member where username='".$_SESSION['member']."'"));
          $memberId=$memberId['id'];
          
          $sql="INSERT INTO comments (memberId, productId, date, content) VALUES ($memberId, $productId, now(), '$content')";
          $connect->query($sql);
      else :
            header("location:?option=singin"); 
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
<div class="w-[1170px] mx-auto bg-white mt-[10px] rounded-lg shadow-sm">
    <div class="flex flex-row justify-center items-center">
        <!-- Ảnh sản phẩm -->
        <div class="w-1/2 h-[450px] border border-black-300 flex justify-center items-center ">
            <img src="images/<?=$item['image']?>" alt="Product"
                class="w-[400px] scale-1 h-[300px] hover:rotate-180 hover-zoom">
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="w-1/2 mx-4">
            <h1 class="text-3xl font-bold mb-2">Tên sản phẩm : <?=$item['name']?></h1>
            <h2 class="text-2xl font-semibold mb-2">Giá sản phẩm : <?=number_format($item['price'],0,'.','.')?>đ</h2>
            <p class="text-lg mb-4">Mô tả sản phẩm : <?=$item['description']?></p>
            <form method="get">
                <div class="flex flex-row items-center mb-4">
                    <button class="bg-blue-300 hover:bg-orange-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                        -
                    </button>
                    <input type="hidden" name="option" value="cart">
                    <input type="hidden" name="id" value="<?=$item['id']?>">
                    <input type="text" name="qty" class="border text-center w-[100px] border border-black-400 h-[42px]"
                        value="1">
                    <button class="bg-blue-300 hover:bg-orange-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                        +
                    </button>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Mua ngay
                </button>
            </form>





        </div>
    </div>

</div>
<style>
.hover-zoom {
    transform: scale(1.2);
    transition: transform 0.5s ease;
}
</style>
<?php endforeach; ?>
<div class="w-[1170px] mx-auto">
    <div class="bg-white border rounded-lg shadow-sm p-4 mt-[20px]">
        <h2 class="text-lg font-semibold mb-4">Comments</h2>
        <?php
    if(isset($_GET['id'])){
        $productId=$_GET['id'];
        $comment=$connect->query("select * from member a join comments
        b on a.id=b.memberId join products c on b.productId=c.id where productId=$productId and b.status=1");
        if(mysqli_num_rows($comment)==0):
            echo "<p class='text-gray-600'>No Comment!</p>";
        else:
            foreach($comment as $item): ?>
        <div class="bg-gray-100 border rounded-lg p-4 mb-4">
            <h2 class="text-lg font-semibold mb-2"><?=$item['username']?></h2>
            <p class="text-gray-600 mb-2"><?=$item['date']?></p>
            <p class="text-gray-800"><?=$item['content']?></p>
        </div>
        <?php endforeach;
        endif;
    }
    ?>
        <form method="post" class="mt-4">
            <textarea class="border border-gray-400 rounded-lg w-full p-2 mb-2" name="content" id="" cols="30" rows="5"
                placeholder="Enter your comment here"></textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Post Comment
            </button>
        </form>
    </div>
</div>