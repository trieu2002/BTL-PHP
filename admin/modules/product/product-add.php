<?php
 
 include "db/connect.php";
 $sql="select * from categories";
 
 $result=$connect->query($sql);
 if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $status=$_POST['status'];
    $id=$_POST['categories'];
  
    $desc1=$_POST['desc'];
    if(isset($_FILES['file'])){
        $file=$_FILES['file'];
        $file_name=$file['name'];
        move_uploaded_file($file['tmp_name'],'images/'.$file_name);
    }
    
    $sql1 = "INSERT INTO products(image,price,description,status,cateId,name) VALUES('$file_name',$price,'$desc1',$status,$id,'$name')";
    if ($connect->query($sql1) === TRUE) {
        echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href = '?option=list-product';</script>";
    } else {
        echo "Lỗi: " . $connect->error;
    }
    
}

?>
<div class="container">
    <div class="col-sm-8">
        <h2 class="">Thêm sản phẩm</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="price">Imgae:</label>
                <input type="file" name="file" class="form-control" id="price" placeholder="Enter product Image">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="1">Hiển thị</option>
                    <option value="0">Tạm ẩn</option>

                </select>
            </div>
            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea class="form-control" name="desc" placeholder="Enter product description"></textarea>
            </div>
            <div class="form-group">
                <label for="categories">Categories:</label>
                <select class="form-control" name="categories">
                    <?php foreach($result as $item) : ?>
                    <option value="<?=$item['id'] ?>"><?=$item['name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn">Thêm sản phẩm</button>
        </form>
    </div>
</div>