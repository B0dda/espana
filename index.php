<?php include ('includes/header.php'); ?>
<div class="top-slider">
<div class="slider" data-timer="5000">
  <?php
$slider = DB::query('SELECT * FROM slider WHERE isActivated=1');
foreach ($slider as $slide)
{
?>
      <div class="slide">
        <img src="control/uploads/<?php echo $slide['image']; ?>"> 
      </div>
      <?php
}
?>
</div>
<div class="slide-button left">
  <i class="fas fa-arrow-left"></i>
</div>
<div class="slide-button right">
  <i class="fas fa-arrow-right"></i>
</div>

</div>

<div class="wrapper">
<div class="heading">
  آخر ما وصلنا
</div>
<div class="product-cards flex">
<?php
$products = DB::query('SELECT * FROM products');
foreach ($products as $product)
{
?>
  <div class="card">
    <div class="product-image">
      <?php
      $image = DB::query('SELECT image FROM products_image WHERE product_id=:product_id',array(':product_id'=>$product['id']))[0]['image'];
      ?>
      <a href="product.php?id=<?php echo $product['id'] ?>"><img src="control/uploads/<?php echo $image; ?>"></a>
    </div>
    <div class="title">
      <?php echo $product['name'] ?>
    </div>
    <div class="sep"></div>
    <div class="price">
    <?php echo $product['price'] ?> ر.س
    </div>
    <a href="product.php?id=<?php echo $product['id'] ?>"><div class="button w-80 view">عرض</div></a>
    <div class="button w-80 add">أضف للسلة</div>
  </div>
  <?php
}

?>
<!-- <?php for ($i = 0;$i < 5;$i++): ?>

<div class="card">
  <div class="product-image">
  <a href="product.php"><img src="uploads/photo.jpeg"></a>
  </div>
  <div class="title">
    هذ نص للتجربة
  </div>
  <div class="sep mb-30"></div>
   <div class="price mb-30">
    1,000 ر.س
  </div>
   <div class="button w-80 view">عرض</div>
  <div class="button w-80 add">أضف للسلة</div>
   Custom Add and View buttons
   <div class="two-in-one">
    <button class="cus-btn flex-1" id="addBtn"><i class="fas fa-shopping-cart"></i></button>
    <button class="cus-btn flex-1" id="viewBtn"><i class="fas fa-eye"></i></button>
  </div>
  <div class="buttonnn w-60 add"> أضف  1,000 رس</div>
</div>
<?php
endfor ?> -->
<div class="card extra"></div>
<div class="card extra"></div>
<div class="card extra"></div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="layout/js/all.js"></script>
</body>
</html>
<?php include ('includes/footer.php'); ?>
