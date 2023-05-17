<?php
include "./db/connect.php";
$sql="SELECT * FROM member WHERE status=1";
$result=$connect->query($sql);


 
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>

            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>NAME</th>
            <th>LASTNAME</th>
            <th>PHONENUMBER</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <?php foreach($result as $item) : ?>
    <tr>
        <td><?=$item['id']?></td>
        <td><?=$item['username']?></td>




        <td><?=$item['password']?></td>
        <td><?=$item['name']?></td>
        <td><?=$item['lastName']?></td>
        <td><?=$item['phonenumber']?></td>

        <td>
            <span class="badge <?php echo ($item['status'] == 1) ? 'badge-success' : 'badge-danger'; ?>">
                <?php echo ($item['status'] == 1) ? 'Hiển thị' : 'Tạm ẩn'; ?>
            </span>

        </td>
        <td>

            <a href="?option=user-edit&id=<?php echo $item['id'] ?>" class="btn btn-primary"><i
                    class="fa fa-edit"></i></a>



        </td>
    </tr>
    <?php endforeach ; ?>
</table>