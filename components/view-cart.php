<?php 

 $count=0;
 $cart=isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
 $total=0;
 foreach($cart as $item){
    $total+=$item['qty']*$item['price'];
 }
 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'clearCart') {
    unset($_SESSION['cart']);
    header('Location: ?option=home');
    exit;
  }
  if(isset($_POST['id'])){
    $id=$_POST['id'];
}

?>
<div class="w-[1170px] mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Your Cart</h2>
    <?php if(empty($_SESSION['cart'])) :?>
    <h1 class="font-bold text-[20px] text-center">Giỏ hàng trống!</h1>
    <?php else : ?>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Product</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $key => $value): ?>
            <tr>
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
                    <form method="get">
                        <input type="hidden" name="option" value="cart">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?=$value['id']?>">
                        <input type="text" name="qty" value="<?= $value['qty'] ?>"
                            class="w-16 py-1 px-2 border rounded">
                        <button type="submit" class="border px-4 py-2 bg-green-500">Update</button>
                    </form>
                </td>
                <td class="border px-4 py-2 text-center"><?=number_format($value['price'],0,'.','.') ?>đ</td>
                <td class="border px-4 py-2 text-center">
                    <?= number_format($value['price'] * $value['qty'],0,'.','.') ?>đ</td>
                </td>
                <td class="border px-4 py-2 text-center">
                    <form method="get">
                        <input type="hidden" name="option" value="cart">
                        <input type="hidden" name="action" value="remove">
                        <input type="hidden" name="id" value="<?=$value['id']?>">
                        <button class=" bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Remove
                        </button>
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <form method="post">
                        <input type="hidden" name="action" value="clearCart">
                        <button type="submit"
                            class="bg-green-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Clear Cart
                        </button>
                    </form>

                </td>
                <td colspan="2" class="text-right font-bold py-4 text-center">Total:</td>
                <td class="font-bold py-4 text-center"><?=number_format($total,0,'.','.') ?>đ</td>
                <td> <button class="bg-green-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        <a href="?option=home">Tiếp tục mua hàng</a>
                    </button></td>
            </tr>
        </tfoot>
        <div class="flex justify-end mt-6 mr-12">
            <button class="bg-pink-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                <a href="?option=check-out">Checkout</a>
            </button></ </div>
        </div>
    </table>
    <?php endif;?>