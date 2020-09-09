<?php $title = "السلة"; ?>
<?php 
include('includes/header.php'); 

$cart_info = DB::query('SELECT * FROM cart WHERE user_id=:user_id',array(':user_id'=>$userid));

if(isset($_POST['remove']))
{
  $cart_id = $_GET['rm'];
  DB::query('DELETE FROM cart WHERE id=:id',array(':id'=>$cart_id));
}

if(isset($_GET["action"]))  
{
     if($_GET["action"] == "delete")  
     {  
          DB::query('DELETE FROM cart WHERE id=:id',array(':id'=>$_GET["id"]));
          echo '<script>alert("Item Removed")</script>';  
          echo '<script>window.location="cart.php"</script>';  
     }  
}
?>
<div class="wrapper">
  <?php
    $total_items =  DB::query('SELECT COUNT(id) AS cnt FROM cart WHERE user_id=:user_id',array(':user_id'=>$userid))[0]['cnt'];
    if ($total_items < 1)
    {
      print "  
      <div class='warn mb-30'>
        سلة المشتريات فارغة
      </div>";
    }
  ?>

  <div class="shopping-cart-container">
    <table class="t">
    <?php
        $sum_amount = 0;
        foreach ($cart_info as $ci) {
          $product_name = DB::query('SELECT name FROM products WHERE id=:id',array(':id'=>$ci["product_id"]))[0]['name'];
          $product_price = DB::query('SELECT price FROM products WHERE id=:id',array(':id'=>$ci["product_id"]))[0]['price'];
        ?>
            
      <tr>
          <style>
          </style>
        <td><div class="product-image"></div></td>
        <td><?php echo $product_name;?></td>
        <td><p style="text-align:center"><?php echo $ci["quantity"]; ?></p></td>
        <?php $total_price = $product_price * $ci["quantity"];?>
        <td><div class="price"><?php echo $total_price; ?> رس</div></td>
        <td><a href="cart.php?action=delete&id=<?php echo $ci["id"]; ?>"><button class="trans-btn" name="remove" type="submit"><div class="remove"></div></button></a></td>
      </tr>
      <?php  $sum_amount += $total_price; } ?>
    </table>
    <table> 
      <tr>
        <td></td>
          <td></td>
          <td></td>
          <td> <div class="price">إجمالي السعر:</div></td>
        <td></td>
      </tr>
      <tr>
          <td><a href="checkout.php?sum=<?php echo $sum_amount;?>"><div class="button add">إنهاء عملية الدفع</a></td>
          <td></td>
          <td></td>
          <td> <div class="price"><?php echo $sum_amount; ?> رس</div></td>
        <td><a href="index.php"><div class="button">أكمل تصفح المنتجات</a></td>
      </tr>
    </table>
    <div class="flex" style="justify-content:space-between;">

    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php include('includes/footer.php'); ?>
