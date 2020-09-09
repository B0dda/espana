<?php
include('includes/header.php');
$title = "عرض المنتج";
if(isset($_GET['id']))
{
    $product_info = DB::query('SELECT * FROM products WHERE id=:id',array(':id'=>$_GET['id']));
    $product_features = DB::query('SELECT * FROM features WHERE product_id=:product_id',array(':product_id'=>$_GET['id']));
    if(!$product_info)
    {
      die('PRODUCT NOT FOUND!');
    }
    $product_info = $product_info[0];

    
}
else
{
    die('PRODUCT NOT FOUND!');
}

if(isset($_POST['addcart']))
{
    $quantity = $_POST['quantity'];
    $date = date('Y-m-d H:i:s');
    $userid = Login::isLoggedIn();
    $product_id = $_GET['id'];

    DB::query('INSERT INTO cart VALUES (\'\', :product_id, :quantity, :user_id, :date)', array(':product_id'=>$product_id, ':quantity'=>$quantity,':user_id'=>$userid,':date'=>$date));
    echo '<script>window.location="cart.php"</script>';
}

?>
    <div class="wrapper"> 
        <div class="container">
            <div class="full-product" >
                <div class="product-images" style="position:relative; overflow:hidden;height:500px;">
                  <div class="slider">
                    <?php
                    $product_images = DB::query('SELECT * FROM products_image WHERE product_id=:id',array(':id'=>$_GET['id']));
                    foreach ($product_images as $image)
                    {
                    ?>
                    <div class="main-img slide">
                        <img src="control/uploads/<?php echo $image["image"]; ?>">
                    </div>
                    <?php }?>
                  </div>

                    <div class="sec-img" style="position:absolute;bottom:0;">
                    <?php
                    foreach ($product_images as $image)
                    {
                    ?>
                        <img src="control/uploads/<?php echo $image["image"]; ?>">
                        <?php }?>
                    </div>
                    <div class="slide-button left">
                      <i class="fas fa-arrow-left"></i>
                    </div>
                    <div class="slide-button right">
                      <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
                <div class="product-description">
                    <h1><?php echo $product_info['name']; ?></h1>
                    <p class="pro-price mb-10">ر س <?php echo $product_info['price']; ?></p>
                    <?php
                    if($product_info['isAvailable'] == 1) {
                        print "<p class='availability mb-10'>متوفر</p>";
                    } else if ($product_info['isAvailable'] == 0) {
                        print "<p class='availability mb-10'style='color:red;'>الكمية نفذت</p>";
                    }

                    ?>
                    <p class="delev mb-10">يتم التوصيل في خلال 4 - 8 ايام عمل</p>
                    <ul class="mb-10">
                        <li><p>نوع الماركة : <?php echo $product_info['brand']; ?></p></li>

                        <?php
                        $count=0;
                        foreach ($product_features as $product_feature) {
                        ?>
                            <li><?php echo $product_feature["feature"];?></li>
                            <?php
                            $count++;
                        }
                        ?>
                        <?php for($i = 1; $i<=$count; $i++){
                        ?>
                        <?php
                        } ?>

                    </ul>
                    <hr class="mb-30">
                    <div class="item-counter mb-10">
                    <form action="product.php?id=<?php echo $product_info['id'] ?>" method="POST">
                        <button><i class="fas fa-plus"></i></button>
                        <input type="number" name="quantity" class="counter-input" value="1">
                        <button><i class="fas fa-minus"></i></button>
                    </div>
                    <a href="cart.php"><input type="submit" class="addpr mb-30" name="addcart" id="addcart" value="اضف للسلة"></form></a>
                    <div class="extra-desc">
                        <button id="btnn1" onclick="showDesc()">الوصف و المميزات</button>
                        <button id="btnn2" onclick="showPrice()">الدفع و التوصيل</button>
                        <p id="descDesc"><?php echo $product_info['description']; ?></p>
                        <p id="descPrice"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showDesc()
        {
            var Description = "<?php echo $product_info['description']; ?>";
            document.getElementById("btnn1").style.color = "#6381a8";
            document.getElementById("btnn2").style.color = "black";

            document.getElementById("btnn1").style.borderBottom = "1.5px solid #6381a8";
            document.getElementById("btnn2").style.border = "none";

            document.getElementById("descDesc").innerHTML = Description;
        }

        function showPrice()
        {
            var Payment = "<?php echo $product_info['paymentDetails']; ?>";
            document.getElementById("btnn2").style.color = "#6381a8";
            document.getElementById("btnn1").style.color = "black";

            document.getElementById("btnn2").style.borderBottom = "1.5px solid #6381a8";
            document.getElementById("btnn1").style.border = "none";

            document.getElementById("descDesc").innerHTML = Payment;
        }
    </script>
<?php include('includes/footer.php'); ?>
