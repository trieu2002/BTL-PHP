<?php 
 include "db/connect.php";
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from products where id=$id";
    $result=$connect->query($sql);
    $arrayList=mysqli_fetch_array($result);
  
    $sql_categories = "select * from categories";
    $result_categories = $connect->query($sql_categories);
 }
 if(isset($_POST['btn'])){
    $id=$_GET['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $desc = $_POST['desc'];
    $categories = $_POST['categories'];
  if($_FILES['image']['size']>0){
    $file=$_FILES['image'];
    $file_name=$file['name'];
    move_uploaded_file($file['tmp_name'],'images/'.$file_name);
    $image = $file_name;
}else{
    $image = $arrayList['image'];
}
  $sql_update = "UPDATE products SET name='$name', price='$price', image='$image', status='$status', description='$desc', cateId='$categories' WHERE id=$id";
  $result_update = $connect->query($sql_update);
  if ($result_update) {
    // Update sản phẩm thành công, chuyển hướng về trang danh sách sản phẩm
    header('Location: ?option=list-product');
    exit();
} else {
    // Update sản phẩm thất bại, hiển thị thông báo lỗi
    echo "Có lỗi xảy ra khi update sản phẩm!";
}

 }

?>
<div class="container">
    <div class="col-sm-8">
        <h2 class="">Update sản phẩm</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" value="<?=$arrayList['name']?>" class="form-control" name="name"
                    placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control" id="image">
                <?php if ($arrayList['image']): ?>
                <p><?= $arrayList['image'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" value="<?=$arrayList['price']?>" name="price" class="form-control" id="price"
                    placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if ($arrayList['status'] == 1) echo 'selected'; ?>>Hiển thị</option>
                    <option value="0" <?php if ($arrayList['status'] == 0) echo 'selected'; ?>>Tạm ẩn</option>
                </select>
            </div>
            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea class="form-control" name="desc"
                    placeholder="Enter product description"><?=$arrayList['description']?></textarea>
            </div>
            <div class="form-group">
                <label for="categories">Categories:</label>
                <select class="form-control" name="categories">
                    <?php foreach($result_categories as $item) : ?>
                    <option value="<?=$arrayList['cateId']?>"><?=$item['name']?></option>

                    <?php endforeach ; ?>


                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn">Update sản phẩm</button>
        </form>
    </div>
</div>