<?php include "./db/connect.php"; ?>
<?php 
  $sql="select * from banner";
  $result=$connect->query($sql);
  $img=mysqli_fetch_all($result);
?>
<div class="swiper-container w-[100%] h-auto truncate z-10">

    <div class="swiper-wrapper z-10">
        <?php foreach($img as $item) :?>
        <div class="swiper-slide"><img src="images/<?= $item[1] ?>"></div>
        <?php endforeach ;?>
    </div>


</div>

<!-- Include Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 3000,
    },
});
</script>