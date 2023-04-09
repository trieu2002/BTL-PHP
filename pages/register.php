<?php include "./db/connect.php"; ?>
<?php 
 if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $lastName=$_POST['lastName'];
    $username=$_POST['user'];
    $password=$_POST['password'];
    $alert=[];
    $phoneNumber=$_POST['phoneNumber'];
    $sql="select * from member where username='$username'";
    $result=$connect->query($sql);
    if(mysqli_num_rows($result)!=0){
        $alert['err']="Tên tài khoản đã tồn tại";
    }else{
        $sql="insert into member(username,password,name,lastName,phoneNumber) 
         values('$username','$password','$name','$lastName','$phoneNumber')
        ";
        $result=$connect->query($sql);
        header("location:?option=singin");
        exit;
    }
 }
?>
<div class="px-[54px] py-[15px] bg-[#fff] mb-[40px] truncate w-[60%] mx-auto mt-[50px]">
    <div>
        <h1 class="m-[0px] p-[0px] text-[22px] font-bold text-center">ĐĂNG KÝ TÀI KHOẢN</h1>
    </div>
    <div class="mr-[-15px] ml-[-15px] w-[80%] ml-[20%]">
        <form action="?option=register" method="post" class="w-[100%] ">
            <?php if(isset($alert['err'])) :?>
            <span style="color:red"><?=$alert['err'] ?></span>

            <?php endif ; ?> <br> <br>
            <label for="" class="font-bold text-[16px]">Tên</label><span>*</span> <br> <br>
            <input required class="border border-black-400 w-[70%] h-[40px] outline-none pl-[20px]" type="text"
                name="name">
            <br> <br>
            <label for="" class="font-bold text-[16px]">Họ</label><span>*</span> <br> <br>
            <input required class="border border-black-400 w-[70%] h-[40px] outline-none pl-[20px]" type="text"
                name="lastName">
            <br> <br>
            <label for="" class="font-bold text-[16px]">Email</label><span>*</span> <br> <br>
            <input pattern="[a-zA-Z0-9./]+@[a-z]+.[a-z]{2,4}" required
                class="border border-black-400 w-[70%] h-[40px] outline-none pl-[20px]" type="email" name="user">
            <br> <br>
            <label for="" class="font-bold text-[16px]">Password</label><span>*</span> <br> <br>
            <input required class="border border-black-400  w-[70%] h-[40px] outline-none pl-[20px]" type="password"
                name="password"> <br> <br>
            <label for="" class="font-bold text-[16px]">Điện thoại</label><span>*</span> <br> <br>
            <input required class="border border-black-400 w-[70%] h-[40px] outline-none pl-[20px]" type="tel"
                pattern="(03|\+84)\d{9,}" name="phoneNumber">
            <br> <br>
            <div class="flex justify-between w-[70%]">
                <input type="submit" name="btn" value="Đăng kí" class="border bg-green-600
             border-green-600 w-[120px] px-[0px] text-white text-[16px] cursor-pointer
                 h-[40px] text-center flex align-center justify-center hover:bg-[#fff] hover:text-green-800 ">
                <span class="border bg-green-600
             border-green-600 w-[120px] px-[0px] text-white text-[16px] h-[40px] text-center leading-[40px]"><a
                        href="?option=singin">Quay
                        lại</a></span>
            </div>
        </form>
    </div>
</div>