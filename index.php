<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <title>Tobee Food</title>
</head>
<style>
.bg {
    background-color: #ebe9e942;
}
</style>

<body>
    <div class="w-[100%] bg-green-500">
        <?php include "./components/MenuTop.php" ?>
    </div>
    <div class="w-[1170px] mx-auto">

        <?php include "./components/Header.php" ?>
    </div>
    <div class="w-[100%] bg-green-500 h-[50px]">
        <?php include "./components/Nav.php"; ?>

        <div class="w-[100%] bg">


            <?php
            if(isset($_GET['option'])){
                switch($_GET['option']){
                    case 'register':
                        include "./pages/register.php";
                        break;
                    case 'singin':
                        include "./pages/singin.php";
                        break;
                    case 'home':
                        include "./pages/home.php";
                        break;
                    case 'singup':
                        include "./pages/singup.php";
                        break;
                    case 'product':
                        include "./components/product.php";
                        break;
                    case 'productSale':
                        include "./components/productSale.php";
                        break;
                    case 'productDetail':
                        include "./pages/productDetail.php";
                        break;
                    case 'cart':
                        include "./pages/cart.php";
                        break;
                   case 'view-cart':
                      include "./components/view-cart.php";
                      break;
                    case 'check-out':
                        include "./pages/check-out.php";
                        break;
                    case '*':
                        include "./pages/pageError.php";
                            break;
                    default:
                            include "./pages/pageError.php";
                            break;
                    
                        

                    
                }
            }else{
                include "./pages/home.php";
            }
            
        
        ?>
            <?php include "./components/footer.php" ?>

        </div>
        <?php include "./components/copyright.php"; ?>

    </div>
</body>

</html>