<?php 
  include "db/connect.php";
  $sql="select * from ingredient";
  $result=$connect->query($sql);
  
  
?>

<div class="w-[1170px] mx-auto grid grid-cols-4 gap-8">
    <div>
        <h2 class="text-uppercase">NGUYÊN LIỆU PHA CHẾ</h2>
        <ul>
            <?php while ($item = mysqli_fetch_array($result)): ?>
            <li><?= $item['name'] ?>.</li>
            <li><strong>Địa chỉ : </strong><?= $item['address'] ?>.</li>
            <li><strong>MST : </strong><?= $item['date'] ?>.</li>
            <li><strong>Hotline : </strong><?= $item['hotline'] ?>.</li>
            <li><strong>Email : </strong><?= $item['email'] ?>.</li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div>
        <h2>VỀ CHÚNG TÔI</h2>
        <ul>
            <li>Về chúng tôi</li>
            <li>Đối tác khách hàng</li>
            <li>Liên hệ</li>
        </ul>
    </div>
    <div>
        <h2>CHÍNH SÁCH</h2>
        <ul>
            <li>Giao hàng miễn phí</li>
            <li>Chính sách đổi trả</li>
            <li>Chính sách bán hàng</li>
            <li>Chính sách bảo mật</li>
            <li>Chính sách - quy định chung</li>
            <li>Chính sách thanh toán</li>
        </ul>
    </div>
    <div>
        <h2>CHƯƠNG TRÌNH KHUYỄN MÃI</h2>
        <ul>
            <li>Ưu đãi khách hàng mới</li>
            <li>Khuyễn mãi đặc biệt</li>
        </ul>
    </div>
</div>
