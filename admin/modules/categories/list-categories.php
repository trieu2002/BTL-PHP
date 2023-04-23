<?php
include "./db/connect.php";
$sql="select * from categories where status=1";
$result=$connect->query($sql);



?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>

            <th>NAME</th>


            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <?php foreach($result as $item) : ?>
    <tr>
        <td><?=$item['id']?></td>
        <td><?=$item['name']?></td>







        <td>
            <span class="badge <?php echo ($item['status'] == 1) ? 'badge-success' : 'badge-danger'; ?>">
                <?php echo ($item['status'] == 1) ? 'Hiển thị' : 'Tạm ẩn'; ?>
            </span>

        </td>
        <td>

            <a href="?option=categories-edit&id=<?php echo $item['id'] ?>" class="btn btn-primary"><i
                    class="fa fa-edit"></i></a>
            <a href="?option=categories-delete&id=<?php echo $item['id']?>"
                onclick="return confirm('Bạn chắc chắn muốn xóa ?');" class="btn btn-danger"><i
                    class="fa fa-trash"></i></a>


        </td>
    </tr>
    <?php endforeach ; ?>
</table>