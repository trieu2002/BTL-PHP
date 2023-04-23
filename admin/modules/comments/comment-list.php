<?php
include "./db/connect.php";

$perPage=5;
$page=isset($_GET['page']) ? $_GET['page'] : 1;
$sql1="select * from comments";
$kq=$connect->query($sql1);
$toatl=mysqli_num_rows($kq);
$start=($page-1)*$perPage;
$sql="SELECT c.id, c.content, c.date, c.status, m.username AS nameMember, p.name AS nameProduct
FROM comments c
JOIN member m ON c.memberId = m.id
JOIN products p ON c.productId = p.id
ORDER BY c.id ASC
LIMIT $start,$perPage";
$totalPage=ceil($toatl/$perPage);
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


        <td><?php echo htmlspecialchars($item['content']); ?></td>

        <td><?=$item['date']?></td>
        <td><?=$item['nameMember']?></td>
        <td><?=$item['nameProduct']?></td>

        <td>
            <span class="badge <?php echo ($item['status'] == 1) ? 'badge-success' : 'badge-danger'; ?>">
                <?php echo ($item['status'] == 1) ? 'Hiển thị' : 'Tạm ẩn'; ?>
            </span>

        </td>
        <td>

            <a href="?option=comments-edit&id=<?php echo $item['id'] ?>" class="btn btn-primary"><i
                    class="fa fa-edit"></i></a>
            <a href="?option=comments-delete&id=<?php echo $item['id']?>"
                onclick="return confirm('Bạn chắc chắn muốn xóa ?');" class="btn btn-danger"><i
                    class="fa fa-trash"></i></a>


        </td>
    </tr>
    <?php endforeach ; ?>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if ($page > 1) : ?>
        <li class="page-item">
            <a class="page-link" href="?option=list-comment&page=<?php echo $page - 1?>">Prev</a>

        </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
            <a class="page-link" href="?option=list-comment&page=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
        <?php endfor; ?>
        <?php if ($page < $totalPage) : ?>
        <li class="page-item">
            <a class="page-link" href="?option=list-comment&page=<?php echo $page + 1;?>">Next</a>

        </li>
        <?php endif; ?>
    </ul>
</nav>