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
  $images = $_POST['images'];

  DB::query('INSERT INTO products VALUES(\'\',:name,:price,:brand,:features,:category,:branchOne,0,:description,:paymentDetails,:images,1)',
  array(':name'=>$name,
        ':price'=>$price,
        ':brand'=>$brand,
        ':features'=>$features,
        ':category'=>$category,
        ':branchOne'=>$branchone,
        ':description'=>$description,
        ':paymentDetails'=>$payment,
        ':images'=>$images));
  

  $product_id = DB::query('SELECT id FROM products ORDER BY id DESC LIMIT 1')[0]['id'];
  for ($x = 0; $x < $features; $x++) 
  {
    $feature = $_POST['feature'.$x];
    DB::query('INSERT INTO features VALUES(\'\',:feature,:product_id)',
    array(':feature'=>$feature,':product_id'=>$product_id));
  }


  for ($z = 0; $z < $images; $z++) 
  {
        $filename = $_FILES['image'.$z]['name'];

        $destination = 'uploads/' . $filename;

        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $file = $_FILES['image'.$z]['tmp_name'];
        $size = $_FILES['image'.$z]['size'];
        
        if ($_FILES['image'.$z]['size'] > 1000000)
        { 
            echo "File too large!";
        } 
        else 
        { 
            if (move_uploaded_file($file, $destination)) 
            {
              DB::query('INSERT INTO products_image VALUES(\'\',:image,:product_id)',
              array(':image'=>$filename,':product_id'=>$product_id));
            }
            else 
            {
                echo "Failed to upload file.";
            }
        }
  }



  echo '<script>alert("Product Added")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espana | Add Product</title>

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
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8" style="margin: 0 auto;">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="addproduct.php" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Product Name..">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Price..">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="brand" class="form-control" placeholder="Brand..">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Description ..."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-9">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Features Number</label>
                        <input type="number" name="features" id="count" class="form-control" placeholder="Features Number..">
                      </div>
                    </div> 
                    <div class="col-sm-3">
                      <!-- text input -->
                      <script type='text/javascript'>
                            function addField()
                            {
                                var number = document.getElementById("count").value;
                                var container = document.getElementById("container");
                                while (container.hasChildNodes()) {
                                    container.removeChild(container.lastChild);
                                }
                                for (i=0;i<number;i++){
                                    container.appendChild(document.createTextNode("Feature " + (i+1)));
                                    var input = document.createElement("input");
                                    input.type = "text";
                                    input.name = "feature" + i;
                                    input.placeholder = "Feature..";
                                    input.classList.add("form-control");
                                    container.appendChild(input);
                                    container.appendChild(document.createElement("br"));
                                }
                            }
                        </script>
                      <div class="form-group">
                        <label>Add</label>
                        <input type="button" name="addd" class="form-control btn btn-block btn-primary btn-sm" onclick="addField()" placeholder="" value="Add">
                      </div>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" id="container">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                        <?php $categories = DB::query('SELECT * FROM categories');
                          foreach ($categories as $cat) {
                          ?>
                          <option value="<?php echo $cat['id']; ?>"><?php echo $cat['category']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Branch One</label>
                        <select name="branchone" class="form-control">
                        <?php $branch_one = DB::query('SELECT * FROM branchOne');
                          foreach ($branch_one as $br) {
                          ?>
                          <option value="<?php echo $br['id']; ?>"><?php echo $br['branchOne']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Payment Details</label>
                        <textarea class="form-control" name="payment" rows="3" placeholder="Payment Details ..."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-9">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Images Number</label>
                        <input type="number" name="images" id="countt" class="form-control" placeholder="Images Number..">
                      </div>
                    </div> 
                    <div class="col-sm-3">
                      <!-- text input -->
                      <script type='text/javascript'>
                            function addFields()
                            {
                                var number = document.getElementById("countt").value;
                                var container = document.getElementById("containert");
                                while (container.hasChildNodes()) {
                                    container.removeChild(container.lastChild);
                                }
                                for (i=0;i<number;i++){
                                    container.appendChild(document.createTextNode("Image " + (i+1)));
                                    var input = document.createElement("input");
                                    input.type = "file";
                                    input.name = "image" + i;
                                    input.placeholder = "Image..";
                                    input.classList.add("form-control");
                                    container.appendChild(input);
                                    container.appendChild(document.createElement("br"));
                                }
                            }
                        </script>
                      <div class="form-group">
                        <label>Add</label>
                        <input type="button" name="addd" class="form-control btn btn-block btn-primary btn-sm" onclick="addFields()" placeholder="" value="Add">
                      </div>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" id="containert">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <button type="submit" name="submit" class="btn btn-block btn-outline-primary btn-sm">Add Product</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            <!-- /.card -->
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
