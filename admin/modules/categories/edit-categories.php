<?php
 
 include "db/connect.php";
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from categories where id=$id";
    $result=$connect->query($sql);
    $item=mysqli_fetch_array($result);
 }
 if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $status=$_POST['status'];
    $sql1="update categories set name='$name', status='$status' where id=$id";
    $kq=$connect->query($sql1);
    if($kq){
        echo "<script>alert('Update danh mục thành công!');window.location.href='?option=list-categories';</script>";
    }
}



 
 
    


?>
<div class="container">
    <div class="col-sm-8">
        <h2 class="">Update danh mục sản phẩm</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" value="<?=$item['name']?>" class="form-control" name="name"
                    placeholder="Enter product name">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if ($item['status'] == 1) echo 'selected'; ?>>Hiển thị</option>
                    <option value="0" <?php if ($item['status'] == 0) echo 'selected'; ?>>Tạm ẩn</option>

                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="btn">Update danh mục</button>
        </form>
    </div>
</div>