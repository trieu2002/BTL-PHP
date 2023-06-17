<?php 
  include "./db/connect.php";

 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from member where id=$id";
    $result=$connect->query($sql);
    $arrayList=mysqli_fetch_array($result);
  
   
 }
 if(isset($_POST['btn'])){
    
      
    
        $username=$_POST['name'];
        $password=$_POST['password'];
        $name1=$_POST['name1'];
        $name2=$_POST['name2'];
        $phone=$_POST['phone'];
        $status=$_POST['status'];
        $sql="UPDATE member SET username='$username',password='$password',name='$name1',lastName='$name2',status=$status,phonenumber='$phone' where id=$id";
        $kq=$connect->query($sql);
        if($kq){
            echo "<script>alert('Update user thành công!');window.location.href='?option=list-user';</script>";
        }
     
 }
?>

<div class="container">
    <div class="col-sm-8">
        <h2 class="">Update thông tin User</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" value="<?=$arrayList['username']?>" class="form-control" name="name"
                    placeholder="Enter product name">
                <input type="hidden" value="<?=$arrayList['id']?>" name="id">
            </div>

            <div class="form-group">
                <label for="price">Password:</label>
                <input type="text" value="<?=$arrayList['password']?>" name="password" class="form-control" id="price"
                    placeholder="Enter product price">
            </div>

            <div class="form-group">
                <label for="price">Name:</label>
                <input type="text" value="<?=$arrayList['name']?>" name="name1" class="form-control" id="price"
                    placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="price">Lastname:</label>
                <input type="text" value="<?=$arrayList['lastName']?>" name="name2" class="form-control" id="price"
                    placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="price">Phonenumber:</label>
                <input type="text" value="<?=$arrayList['phonenumber']?>" name="phone" class="form-control" id="price"
                    placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if ($arrayList['status'] == 1) echo 'selected'; ?>>Hiển thị</option>
                    <option value="0" <?php if ($arrayList['status'] == 0) echo 'selected'; ?>>Tạm ẩn</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn">Update sản phẩm</button>
        </form>
    </div>
</div>