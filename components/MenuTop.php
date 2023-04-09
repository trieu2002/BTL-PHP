<div class="w-[1170px] mx-auto  py-[5px] flex align-center justify-between">

    <h1 class="text-white text-[15px]">Chào mừng bạn đến với Tobee Food!</h1>


    <ul class="flex">
        <?php if(empty($_SESSION['member'])): ?>
        <li><a href="?option=singin" class="text-[#fff] text-[15px] mr-[10px]"><i
                    class="fa fa-user-plus text-white mr-[3px]"></i>Đăng
                nhập</a>
        <li><a href="?option=register" class="text-[#fff] text-[15px]"><i
                    class="fa-solid fa-right-to-bracket mr-[3px]"></i>Đăng
                kí</a></li>
        </li>
        <?php else :?>
        <li><a href="?option=register" class="text-[#fff] text-[15px] mr-[5px]">
                Hello:<?=$_SESSION['member']?>
            </a></li>
        </li>
        <li><a href="?option=singup" class="text-[#fff] text-[15px]">
                Đăng xuất
            </a></li>
        </li>
        <?php endif; ?>
    </ul>


</div>