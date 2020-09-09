<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}

function truncate($text, $length) 
{
  $length = abs((int)$length);
  if(strlen($text) > $length) {
     $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
  }
  return($text);
}

$order_id = $_GET['order'];

$order_item_info = DB::query('SELECT * FROM order_items WHERE order_id=:order_id',array(':order_id'=>$order_id));

$date = date('Y-m-d');

$client_id = DB::query('SELECT user_id FROM orders WHERE id=:id',array(':id'=>$order_id))[0]['user_id'];

$address_id = DB::query('SELECT address_id FROM orders WHERE id=:id',array(':id'=>$order_id))[0]['address_id'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espana | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Espana, Inc.
          <small class="float-right">Date: <?php echo $date;?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Espana, Inc.</strong><br>
          Phone: (101) 123-5432<br>
          Email: info@espana.com
        </address>
      </div>
      <!-- /.col -->
      <?php
        $user_info = DB::query('SELECT * FROM users WHERE id=:user_id',array(':user_id'=>$client_id));
        $user_info = $user_info[0];

        $address_info = DB::query('SELECT * FROM address WHERE id=:address_id',array(':address_id'=>$address_id));
        $address_info = $address_info[0];
      ?>
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?php echo $user_info['fname'].' '.$user_info['lname']; ?></strong><br>
          <?php echo $address_info['address1'] ?><br>
          <?php echo $address_info['address2'] ?><br>
          Phone: <?php echo $user_info['phone']; ?><br>
          Email: <?php echo $user_info['email']; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
      <b>Invoice #<?php echo $order_id; ?></b><br>
      <br>
      <b>Order ID:</b> <?php echo $order_id; ?><br>
      <b>Payment Due:</b> <?php echo $date; ?><br>
      <b>Account:</b> <?php echo $client_id; ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Qty</th>
            <th>Product</th>
            <th>Serial #</th>
            <th>Description</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <?php 
                    $subtotal = 0;
                    foreach ($order_item_info as $oii) {
                      $product_name = DB::query('SELECT name FROM products WHERE id=:id',array(':id'=>$oii["product_id"]))[0]['name'];
                      $product_description = DB::query('SELECT description FROM products WHERE id=:id',array(':id'=>$oii["product_id"]))[0]['description'];
                      $tranc_pd = truncate($product_description,50);
                    ?>
                    <tr>
                      <td><?php echo $oii["quantity"]; ?></td>
                      <td><?php echo $product_name;?></td>
                      <td><?php echo $tranc_pd; ?></td>
                      <td><?php echo $oii["price"] * $oii["quantity"]; ?> رس</td>
                    </tr>
                    <?php
                    $subtotal += $oii["price"] * $oii["quantity"];
                  }?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="dist/img/credit/visa.png" alt="Visa">
        <img src="dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="dist/img/credit/american-express.png" alt="American Express">
        <img src="dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        Payment method Accepted. OnlinePayment. You can pay by using Master Visa and Amex Credit Card. Only GCC card Accepted Corporate Cards Not accepted.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Amount Due <?php echo $date;?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td><?php echo $subtotal;?> رس</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>10.00 رس</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td><?php echo $subtotal + 10;?> رس</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
