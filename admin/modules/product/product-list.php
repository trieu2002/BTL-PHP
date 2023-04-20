<?php 
ob_start();
include "./db/connect.php";

$sql_count = "SELECT COUNT(*) AS total FROM products ";
$search=isset($_GET['search']) ? $_GET['search'] : "";
$result_count = $connect->query($sql_count);
$total = $result_count->fetch_assoc()['total'];

// Số sản phẩm trên một trang
$per_page = 5;

// Tổng số trang
$total_page = ceil($total / $per_page);

// Trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Vị trí sản phẩm đầu tiên trên trang
$start = ($current_page - 1) * $per_page;

// Lấy danh sách sản phẩm cho trang hiện tại
$sql = "SELECT p.id, p.name, p.image, p.price, p.description, c.name AS categories_name, p.status
        FROM products p
        JOIN categories c ON p.cateId = c.id
        ";
if (!empty($search)) {
    $sql .= " AND p.name LIKE '%$search%'";
  }
$sql .= " LIMIT $start,$per_page";
$result = $connect->query($sql);
?>
<div class="row mb-4 ">
    <div class="col-md-12">
        <form action="" method="get" class="form-inline">
            <div class="form-group">
                <input type="hidden" name="option" value="list-product">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên sản phẩm"
                    value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
        </form>
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>IMAGE</th>
            <th>PRICE</th>
            <th>DESC</th>
            <th>CATEGORIES</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <?php foreach($result as $item) : ?>
    <tr>
        <td><?=$item['id']?></td>
        <td><?=$item['name'] ?></td>
        <td><img src="images/<?=$item['image']?>" width="80" alt=""></td>
        <td><?=$item['price']?></td>
        <td><?=$item['description']?></td>
        <td>
            <?=$item['categories_name']?>

        </td>
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

<!-- Hiển thị phân trang -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if ($current_page > 1) : ?>
        <li class="page-item">
            <a class="page-link"
                href="?option=list-product&page=<?php echo $current_page - 1;?><?php echo !empty($search) ? "&search=$search" : ""; ?>">Next</a>

        </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_page; $i++) : ?>
        <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
            <a class="page-link"
                href="?option=list-product&page=<?php echo $i; ?><?php echo !empty($search) ? "&search=$search" : ""; ?>"><?php echo $i; ?></a>
        </li>
        <?php endfor; ?>
        <?php if ($current_page < $total_page) : ?>
        <li class="page-item">
            <a class="page-link"
                href="?option=list-product&page=<?php echo $current_page + 1;?><?php echo !empty($search) ? "&search=$search" : ""; ?>">Next</a>

        </li>
        <?php endif; ?>
    </ul>
</nav>