<?php 
session_start();
include "db/connect.php";
 if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $err=[];
    $password=$_POST['password'];

    $sql="select * from admin where name='$name' and password='$password'";
    $result=$connect->query($sql);
    
    if(mysqli_num_rows($result)==0){
        $err['error']="Tên tài khoản or mật khẩu không đúng";
    }else{
        $result=mysqli_fetch_array($result);
        var_dump($result);
        $_SESSION['admin']=$result['name'];
         header('location:index.php');
         exit;
        
    }

 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
</head>

<body>
    <div class="px-[54px] py-[15px] bg-[#fff] mb-[40px] truncate w-[60%] mx-auto mt-[50px]">
        <div>
            <h1 class="m-[0px] p-[0px] text-[22px] font-bold text-center">ĐĂNG NHẬP TÀI KHOẢN</h1>
        </div>
        <div class="mr-[-15px] ml-[-15px] w-[80%] ml-[20%]">
            <form action="" method="post" class="w-[100%] ">
                <?php if(isset($err['error'])) :?>
                <span style="color:red" class="mt-[15px]"><?=$err['error'] ?></span>
                <?php endif ; ?> <br> <br>
                <label for="" class="font-bold text-[16px]">Tên đăng nhập</label><span>*</span> <br> <br>
                <input class="border border-black-400 w-[70%] h-[40px] outline-none pl-[20px]" type="text" name="name">
                <br> <br>
                <label for="" class="font-bold text-[16px]">Mật khẩu</label><span>*</span> <br> <br>
                <input class="border border-black-400  w-[70%] h-[40px] outline-none pl-[20px]" type="password"
                    name="password"> <br> <br>
                <input type="submit" name="btn" value="Đăng nhập" class="border bg-green-600
             border-green-600 w-[120px] px-[0px] text-white text-[16px] cursor-pointer
                 h-[40px] text-center flex align-center justify-center hover:bg-[#fff] hover:text-green-800 ">
            </form>
        </div>
    </div>
</body>

</html>