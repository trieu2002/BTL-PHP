<?php
include "./db/connect.php";
$sql="SELECT c.id, c.content, c.date, c.status, m.name AS nameMember, p.name AS nameProduct
FROM comments c
JOIN member m ON c.memberId = m.id
JOIN products p ON c.productId = p.id";
$result=$connect->query($sql);
 
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>

            <th>CONTENT</th>
            <th>DATE</th>
            <th>MEMBER NAME</th>
            <th>PRODUCT NAME</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <?php foreach($result as $item) : ?>
    <tr>
        <td><?=$item['id']?></td>


        <td><?=$item['content']?></td>
        <td><?=$item['date']?></td>
        <td><?=$item['nameMember']?></td>
        <td><?=$item['nameProduct']?></td>

        <td>
            <span class="badge <?php echo ($item['status'] == 1) ? 'badge-success' : 'badge-danger'; ?>">
                <?php echo ($item['status'] == 1) ? 'Hiển thị' : 'Tạm ẩn'; ?>
            </span>

        </td>
        <td>

            <a href="?option=product-edit&id=<?php echo $item['id'] ?>" class="btn btn-primary"><i
                    class="fa fa-edit"></i></a>
            <a href="?option=product-delete&id=<?php echo $item['id']?>"
                onclick="return confirm('Bạn chắc chắn muốn xóa ?');" class="btn btn-danger"><i
                    class="fa fa-trash"></i></a>


        </td>
    </tr>
    <?php endforeach ; ?>
</table>