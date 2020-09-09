<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}
if ( isset( $_POST['submit'] ) )
{
  $redirect = $_POST['redirect'];
  $features = $_POST['features'];

  for ($x = 0; $x < $features; $x++) 
  {

    $filename = $_FILES['image'.$x]['name'];

    $destination = 'uploads/' . $filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);
 
    $file = $_FILES['image'.$x]['tmp_name'];
    $size = $_FILES['image'.$x]['size'];
    
    if ($_FILES['image'.$x]['size'] > 1000000)
    { 
        echo "File too large!";
    } 
    else 
    { 
        if (move_uploaded_file($file, $destination)) 
        {
          DB::query('INSERT INTO slider VALUES(\'\',:image,1,:redirects)',
          array(':image'=>$filename,':redirects'=>$redirect));
        }
        else 
        {
            echo "Failed to upload file.";
        }
    }

  }
  echo '<script>alert("Slider Added")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espana | Edit Slider</title>

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
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Slider</li>
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
                <h3 class="card-title">Edit Slider</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="edit-slider.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Slider Redirects </label>
                        <input type="text" name="redirect" class="form-control" placeholder="www.espana.com/product...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-9">
                      <!-- text input -->
                      <div class="form-group">
                        <label>How Many Image ?</label>
                        <input type="number" name="features" id="count" class="form-control" placeholder="Images Count..">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <script type='text/javascript'>
                            function addFields()
                            {
                                var number = document.getElementById("count").value;
                                var container = document.getElementById("container");
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
                      <div class="form-group" id="container">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  </div>

                  <div class="row">
                    <button type="submit" name="submit" class="btn btn-block btn-outline-primary btn-sm">Add Images</button>
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

        <div class="row">
            <div class="col-md-8" style="margin: 0 auto;">
                <div class="card card-danger">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Slider Settings</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                        <style>
                        td,tr {
                            text-align: center;
                        }
                        </style>
                        <table class="table m-0">
                            <thead>
                            <tr>
                            <th>Image ID</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Redirects</th>
                            </tr>
                            </thead>
                            <tbody>
                                                  
                            <?php $sliders = DB::query('SELECT * FROM slider');
                            foreach ($sliders as $slider) {
                            ?><tr>  
                                <td><?php echo $slider['id']; ?></td>
                                <td>
                                <a href="uploads/<?php echo $slider['image']; ?>" target="_blank" data-toggle="lightbox" data-title="sample 7 - white">
                                <img src="uploads/<?php echo $slider['image']; ?>" width="40px" alt="">
                                </a>
                                </td>
                                <td>                  
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3" value="Yes" <?php if ($slider['isActivated'] == 1){echo "checked";}; ?>>
                                        <label class="custom-control-label" for="customSwitch3"></label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo $slider['redirects']; ?>" target="_blank">Click To View</a>
                                </td></tr>
                                <?php } ?>
                            
                            </tbody>
                        </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-footer -->
                    </div>
                </div>
            </div>
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
