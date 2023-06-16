<?php
$count = 1;
include "db/connect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
   
    $sql = "SELECT * FROM orders WHERE id=$id";
    $result = $connect->query($sql);
    $fetchArr = mysqli_fetch_array($result);
   
    
    $sql1="SELECT p.price, p.quantity, p.image, q.name FROM orders_detail p  JOIN products q ON p.product_id=q.id where p.order_id=$id";
    $result=$connect->query($sql1);
   
    $tongTien=0;
    foreach($result as $item){
        $tongTien+=$item['quantity']*$item['price'];
    }
    if(isset($_POST['status'])){
        $status=$_POST['status'];
        $sql="UPDATE orders SET status=$status WHERE id=$id";
        $result=$connect->query($sql);
          header("location:?option=order-detail&id=$id"); // Add the order ID to the redirected URL
        exit(); // Terminate the script after the redirect
       
    }
}
?>
<div>
    <h1 class="text-2xl font-bold mb-4">Thông tin khách hàng</h1>
    <div>
        <p>Tên khách hàng: <?php echo $fetchArr['fullName']; ?></p>
        <p>Số điện thoại: <?=$fetchArr['phone']?></p>
        <p>Địa chỉ nhận hàng: <?=$fetchArr['address']?></p>
        <p>Ghi chú: <?=$fetchArr['note']?></p>
        <p>Ngày đặt hàng: <?=$fetchArr['ngayDat']?></p>
        <p>Trạng thái : <?php 
          if($fetchArr['status']==0) echo "Chưa xử lý";
          else if($fetchArr['status']==1) echo "Đã xử lý";
          else if($fetchArr['status']==2) echo "Đang giao hàng";
          else if($fetchArr['status']==3) echo "Hủy";
          else echo "Đã hoàn thành";
        ?></p>
    </div>
</div>
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Trạng thái</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $item) : ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$item['name']?></td>
                <td>
                    <img src="images/<?=$item['image']?>" width="80" alt="">
                </td>
                <td>
                    <form method="post" action="?option=order-detail&id=<?=$fetchArr['id']?>">
                        <select name="status" class="p-2 border rounded">
                            <option value="0" <?php if($fetchArr['status'] == 0) echo "selected"; ?>>Chưa xử lý</option>
                            <option value="1" <?php if($fetchArr['status'] == 1) echo "selected"; ?>>Đã xử lý</option>
                            <option value="2" <?php if($fetchArr['status'] == 2) echo "selected"; ?>>Đang giao hàng
                            </option>
                            <option value="3" <?php if($fetchArr['status'] == 3) echo "selected"; ?>>Hủy
                            </option>
                            <option value="4" <?php if($fetchArr['status'] == 4) echo "selected"; ?>>Đã hoàn thành
                            </option>
                        </select>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-red rounded">Cập nhật</button>
                    </form>
                </td>
                <td><?=$item['quantity']?></td>
                <td><?=$item['price']?></td>
                <td><?=$item['quantity']*$item['price']?></td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="font-bold">Tổng tiền : <?=$tongTien?></td>
            </tr>
        </tfoot>
    </table>