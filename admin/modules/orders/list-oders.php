<?php
include "./db/connect.php";
$sql="select * from orders";
$result=$connect->query($sql);

?>
<table class="table table-hover">
    <thead>
        <tr>
            <th class="px-4 py-2">Mã khách hàng</th>
            <th class="px-4 py-2">Tên khách hàng</th>
            <th class="px-4 py-2">Địa chỉ</th>
            <th class="px-4 py-2">Trạng thái</th>
            <th class="px-4 py-2">Ngày đặt</th>
            <th class="px-4 py-2">Action</th>
        </tr>
    </thead>
    <?php foreach($result as $item) : ?>
    <tr>
        <td class="border px-4 py-2"><?=$item['user_id']?></td>
        <td class="border px-4 py-2"><?=$item['fullName']?></td>
        <td class="border px-4 py-2"><?=$item['address']?></td>
        <td class="border px-4 py-2">
            <span class="badge <?=($item['status'] == 1) ? 'badge-success' : 'badge-danger'?>">
                <?php  if($item['status']==0) echo "Chưa xử lý";
          else if($item['status']==1) echo "Đã xử lý";
          else if($item['status']==2) echo "Đang giao hàng";
          else if($item['status']==3) echo "Hủy";
          else echo "Đã hoàn thành"; ?>
            </span>
        </td>
        <td class="border px-4 py-2"><?=$item['ngayDat']?></td>
        <td class="border px-4 py-2">
            <a href="?option=order-detail&id=<?php echo $item['id'] ?>" class="btn btn-primary">
                <i class="fa fa-edit"></i>
            </a>
            <a href="?option=delete-order&id=<?php echo $item['id']?>"
                onclick="return confirm('Bạn chắc chắn muốn xóa ?');" class="btn btn-danger"><i
                    class="fa fa-trash"></i></a>

        </td>
    </tr>
    <?php endforeach ; ?>
</table>