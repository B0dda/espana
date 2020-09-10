<?php include ('includes/header.php');

if(isset($_GET['q'])){
  $key = $_GET['q'];

}else{
  
  exit;
}
$cat = "%";
if(isset($_GET['cat'])){
  $cat = $_GET['cat'];

}
$branchOne = "%";
if(isset($_GET['branch'])){
  $branchOne = $_GET['branch'];

}
$branchTwo = "%";
if(isset($_GET['subbranch'])){
  $branchTwo = $_GET['subbranch'];
}
$minPrice = '0';
if(isset($_GET['min'])){
  $minPrice = $_GET['min'];
}
$maxPrice = '999999';
if(isset($_GET['max'])){
  $maxPrice = $_GET['max'];
}
$products = DB::query('SELECT * FROM products WHERE name LIKE :name
  AND category LIKE :category
  AND branchOne LIKE :branchOne
  AND branchTwo LIKE :branchTwo
  AND price >= :minPrice
  AND price <= :maxPrice'
  ,array(
     ':name'=>"%".$key."%",
     ':category'=>$cat,
     ':branchOne'=>$branchOne,
     ':branchTwo'=>$branchTwo,
     ':minPrice'=>$minPrice,
     ':maxPrice'=>$maxPrice
   ));

 ?>

<div class="wrapper">
<div class="heading">
  نتائج البحث
</div>
<div class="product-cards flex">
<?php
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
