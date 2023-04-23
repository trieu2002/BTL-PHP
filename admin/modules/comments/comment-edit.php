<?php 
    include "db/connect.php";
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = (int) $_GET['id'];
        $sql = "select content,date,status from comments where id=$id";
        $result = $connect->query($sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $comment = mysqli_fetch_array($result);
        } else {
            // Handle error if comment with given id does not exist
        }
    } else {
        // Handle error if id is missing or not a valid integer
    }
    if(isset($_POST['btn'])){
        $content=$_POST['content'];
        $date=$_POST['date'];
        $status=$_POST['status'];
        $sql1 = "UPDATE comments SET content='$content', date='$date', status='$status' WHERE id=$id";
        $kq=$connect->query($sql1);
        if($kq){
            echo "<script>alert('Update bình luận thành công!');window.location.href='?option=list-comment';</script>";
        }
        
    }
?>
<div class="container">
    <div class="col-sm-8">
        <h2 class="">Update bình luận</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Content:</label>
                <input type="text" value="<?=htmlspecialchars($comment['content'])?>" class="form-control"
                    name="content" placeholder="Enter comment content">
            </div>
            <div class="form-group">
                <label for="image">Date:</label>
                <input type="text" value="<?=htmlspecialchars($comment['date'])?>" name="date" class="form-control"
                    id="image">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if ($comment['status'] == 1) echo 'selected'; ?>>Hiển thị</option>
                    <option value="0" <?php if ($comment['status'] == 0) echo 'selected'; ?>>Tạm ẩn</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn">Update bình luận</button>
        </form>
    </div>
</div>