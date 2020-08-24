<?php include('includes/header.php'); ?>
<div class="top-slider">
  <div class="slider">
    <?php
      $slider = [1,2,3,4,5];
      foreach ($slider as $slide) {
        ?>
        <div class="slide">
          <img src="uploads/slider_test/<?php echo $slide; ?>.jpg">
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
    <?php for($i =0; $i<5; $i++): ?>
    <div class="card">
      <div class="product-image">
        <img src="uploads/photo.jpeg">
      </div>
      <div class="title">
        ريزر لوحة مفاتيح ريزر بلاك ويدو تي إي كروما الإصدار الثاني
      </div>
      <div class="sep"></div>
      <div class="price">
        1,000 ر.س
      </div>
      <div class="button w-80 view">عرض</div>
      <div class="button w-80 add">أضف للسلة</div>
    </div>
  <?php endfor ?>
  <?php for($i =0; $i<5; $i++): ?>
  <div class="card">
    <div class="product-image">
      <img src="uploads/photo.jpeg">
    </div>
    <div class="title">
      هذ نص للتجربة
    </div>
    <div class="sep"></div>
    <div class="price">
      1,000 ر.س
    </div>
    <div class="button w-80 view">عرض</div>
    <div class="button w-80 add">أضف للسلة</div>
  </div>
<?php endfor ?>
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
