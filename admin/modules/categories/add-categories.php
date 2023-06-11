<?php
include "db/connect.php";
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];

    // Kiểm tra xem tên danh mục đã tồn tại hay chưa
    $sql_check = "SELECT * FROM categories WHERE name = '$name'";
    $result_check = $connect->query($sql_check);

    if ($result_check->num_rows != 0) {
        // Nếu tên đã tồn tại, thông báo lỗi
        echo "<script>alert('Tên danh mục đã tồn tại!');</script>";
    } else {
        // Nếu chưa tồn tại, thêm danh mục vào CSDL
        $sql = "INSERT INTO categories(name, status) VALUES ('$name', '$status')";
        $result = $connect->query($sql);
      
        
        if ($result) {
            $categoryId=$connect->insert_id;
            echo "<script>alert('Thêm danh mục thành công!');</script>";
        } else {
            echo "<script>alert('Thêm sản phẩm thất bại!');</script>";
        }
        
    }
}
?>

<div class="container">
    <div class="col-sm-8">
        <h2 class="">Thêm danh mục sản phẩm</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter product name">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="1">Hiển thị</option>
                    <option value="0">Tạm ẩn</option>

                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="btn">Thêm sản phẩm</button>
        </form>
    </div>
</div>