<?php


include "./db/connect.php";
if(isset($_POST['btn'])){
    $username=$_POST['user'];
    $err=[];
    $password=$_POST['password'];

    $sql="select * from member where username='$username' and password='$password'";
    $result=$connect->query($sql);
    if(mysqli_num_rows($result)==0){
        $err['error']="Tên tài khoản or mật khẩu không đúng";
    }else{
        $result=mysqli_fetch_array($result);
        $_SESSION['member']=$result['username'];
        $_SESSION['id']=$result['id'];
         header('location:?option=home');
         exit;
        
    }

}

ob_end_flush();
?>

<div class="px-[54px] py-[15px] bg-[#fff] mb-[40px] truncate w-[60%] mx-auto mt-[50px]">
    <div>
        <h1 class="m-[0px] p-[0px] text-[22px] font-bold text-center">ĐĂNG NHẬP TÀI KHOẢN</h1>
    </div>
    <div class="mr-[-15px] ml-[-15px] w-[80%] ml-[20%]">
        <form action="?option=singin" method="post" class="w-[100%] ">
            <?php if(isset($err['error'])) :?>
            <span style="color:red" class="mt-[15px]"><?=$err['error'] ?></span>
            <?php endif ; ?> <br> <br>
            <label for="" class="font-bold text-[16px]">Email</label><span>*</span> <br> <br>
            <input class="border border-black-400 w-[70%] h-[40px] outline-none pl-[20px]" type="email" name="user">
            <br> <br>
            <label for="" class="font-bold text-[16px]">Password</label><span>*</span> <br> <br>
            <input class="border border-black-400  w-[70%] h-[40px] outline-none pl-[20px]" type="password"
                name="password"> <br> <br>
            <input type="submit" name="btn" value="Đăng nhập" class="border bg-green-600
             border-green-600 w-[120px] px-[0px] text-white text-[16px] cursor-pointer
                 h-[40px] text-center flex align-center justify-center hover:bg-[#fff] hover:text-green-800 ">
        </form>
    </div>
</div>