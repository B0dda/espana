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
  <title>AdminLTE 3 | Invoice</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include ("includes/navbar.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.php" class="brand-link">
      <img src="dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Espana</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $fullname;?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php include('includes/sidebar.php'); ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Espana, Inc.
                    <small class="float-right">Date: <?php echo $date;?></small>
                  </h4>
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
                  Payment method Accepted. OnlinePayment. You can pay by using Master Visa and Amex Credit Card. Only GCC card Accepted Corporate Cards Not accepted. .
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

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.php?order=<?php echo $order_id;?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('includes/footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
