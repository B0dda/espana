<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}
if ( isset( $_POST['submit'] ) )
{
  $name = $_POST['name'];
  $price = $_POST['price'];
  $brand = $_POST['brand'];
  $description = $_POST['description'];
  $features = $_POST['features'];
  $category = $_POST['category'];
  $branchone = $_POST['branchone'];
  $payment = $_POST['payment'];

  DB::query('INSERT INTO products VALUES(\'\',:name,:price,:brand,:features,:category,:branchOne,0,:description,:paymentDetails,0,1)',
  array(':name'=>$name,
        ':price'=>$price,
        ':brand'=>$brand,
        ':features'=>$features,
        ':category'=>$category,
        ':branchOne'=>$branchone,
        ':description'=>$description,
        ':paymentDetails'=>$payment));
  

  $product_id = DB::query('SELECT id FROM products ORDER BY id DESC LIMIT 1')[0]['id'];
  for ($x = 0; $x < $features; $x++) 
  {
    $feature = $_POST['feature'.$x];
    DB::query('INSERT INTO features VALUES(\'\',:feature,:product_id)',
    array(':feature'=>$feature,':product_id'=>$product_id));
  }
  echo '<script>alert("Product Added")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

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
    <a href="index.php" class="brand-link">
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
            <h1>View Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10" style="margin: 0 auto;">
            <!-- general form elements disabled -->
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">All Orders</h3>
                </div>
              <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                        <th>Order ID</th>
                        <th>Amount(رس)</th>
                        <th>Status</th>
                        <th>Date & Time</th>
                        <th>Invoice</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $orders_info = DB::query('SELECT * FROM orders WHERE user_id=:user_id',array(':user_id'=>$userid));
                        foreach ($orders_info as $oi) {

                        ?>
                        <tr>
                        <td><a href="invoice.php?order=<?php echo $oi["id"];?>"><?php echo $oi["id"];?></a></td>
                        <td><?php echo $oi["amount"];?> رس</td>
                        <?php
                          if($oi["status"] == 1) {
                            print "<td><span class='badge badge-warning'>Pending</span></td>";
                          } elseif ($oi["status"] == 2) {
                            print "<td><span class='badge badge-info'>Processing</span></td>";
                          } elseif ($oi["status"] == 3) {
                            print "<td><span class='badge badge-success'>Shipped</span></td>";
                          } elseif ($oi["status"] == 4) {
                            print "<td><span class='badge badge-danger'>Delivered</span></td>";
                          }
                        ?>
                        <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $oi["date"];?></div>
                        </td>
                        <td><a href="invoice.php?order=<?php echo $oi["id"];?>">Click To View</a></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
              <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
              <!-- /.card-footer -->
            </div>
              </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
