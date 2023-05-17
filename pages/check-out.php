<?php
$count = 0;
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
foreach ($cart as $item) {
    $total += $item['qty'] * $item['price'];
}

include "db/connect.php";

if (isset($_POST['btn'])) {
    $user_id = $_SESSION['id'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $currentDateTime = date('Y-m-d H:i:s');
    // Sử dụng NOW() để lấy ngày hiện tại
    $sql = "INSERT INTO orders (user_id, note, fullName, email, address, phone, ngayDat) 
            VALUES ('$user_id', '$note', '$fullName', '$email', '$address', '$phone','$currentDateTime')";
    $result = $connect->query($sql);

    if ($result) {
        $order_id = mysqli_insert_id($connect); // Sử dụng hàm mysqli_insert_id() để lấy id của bản ghi vừa chèn

        foreach ($cart as $key => $value) {
            $sql1 = "INSERT INTO orders_detail (product_id, price, quantity, image, order_id) 
                     VALUES ('$value[id]', '$value[price]', '$value[qty]', '$value[image]', '$order_id')";
            $kq = $connect->query($sql1);
        }

        unset($_SESSION['cart']);

        echo "<script>alert('Bạn đã đặt hàng thành công!');
              window.location.href='?option=home';</script>";
    }
}
?>
<?php if(isset($_SESSION['member'])) :?>
<div class="w-[1170px] mx-auto  mt-10">
    <h2 class="font-bold text-[30px] text-center mb-6">CHECKOUT ĐƠN HÀNG</h2>
    <div class="flex mx-auto flex gap-4">
        <div class="bg-white p-6 rounded-lg shadow-md w-[40%]">
            <h2 class="text-lg font-medium mb-4">Thông tin thanh toán</h2>
            <form method="post" action="?option=check-out">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="name">Họ và tên</label>
                    <input name="fullName" class="border rounded-lg py-2 px-3 w-full" id="name" type="text"
                        placeholder="Nhập họ tên của bạn" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
                    <input name="email" class="border rounded-lg py-2 px-3 w-full" id="email" type="email"
                        placeholder="Nhập địa chỉ email của bạn" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="email">Điện thoại</label>
                    <input name="phone" class="border rounded-lg py-2 px-3 w-full" id="email" type="tel"
                        placeholder="Nhập điện thoại của bạn" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="email">Địa chỉ</label>
                    <input name="address" class="border rounded-lg py-2 px-3 w-full" id="email" type="text"
                        placeholder="Nhập địa chỉ của bạn" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="email">Note</label>
                    <textarea name="note" class="border rounded-lg py-2 px-3 w-full" id="email" type="text"
                        placeholder="Nhập note của bạn"></textarea>
                </div>
                <button type="submit" name="btn"
                    class="bg-blue-500 text-white rounded-lg py-2 px-4 hover:bg-blue-600 transition-colors duration-300">Thanh
                    toán</button>
            </form>
        </div>

        <div class="w-[60%] bg-white rounded-lg shadow-md">
            <table class="table-auto w-full ">
                <thead>
                    <tr>
                        <th class="px-4 py-2">STT</th>
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Total</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $key => $value): ?>
                    <tr>
                        <td class="border px-4 py-2 text-center">
                            <?=$count++?>
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex items-center">
                                <div class="w-20 h-20 bg-gray-200 mr-4">
                                    <img src="images/<?= $value['image'] ?>" alt="<?= $value['name'] ?>"
                                        class="object-contain h-full w-full">
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold "><?= $value['name'] ?></h3>
                                </div>
                            </div>
                        </td>
                        <td class="border px-4 py-2 text-center">

                            <input type="text" name="qty" value="<?= $value['qty'] ?>"
                                class="w-16 py-1 px-2 border rounded">

                        </td>
                        <td class="border px-4 py-2 text-center"><?=number_format($value['price'],0,'.','.') ?>đ
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <?= number_format($value['price'] * $value['qty'],0,'.','.') ?>đ</td>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>

                        <td colspan="4" class="text-right font-bold py-4 text-center">Total:</td>
                        <td class="font-bold py-4 text-center"><?=number_format($total,0,'.','.') ?>đ</td>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php else :?>
<div class="w-[1170px] mx-auto mt-6">
    <strong><a href="?option=singin">Vui long đăng nhập để đặt hàng</a></strong>
</div>

<?php endif;?>