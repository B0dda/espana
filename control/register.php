<?php
include('includes/head.php');
if ( isset( $_POST['submit'] ) )
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];

  if (!DB::query('SELECT email FROM admins WHERE email=:email', array(':email'=>$email)))
  {
      if (strlen($name) >= 3 && strlen($name) <= 30)
      {
          if (strlen($password) >= 8 && strlen($password) <= 60)
          {
              if (filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                  if($password == $repassword)
                  {
                      DB::query('INSERT INTO admins VALUES(\'\',:name,:email,:password,1)',
                      array(':name'=>$name,
                            ':email'=>$email,
                            ':password'=>password_hash($password, PASSWORD_BCRYPT)));
                      echo '<script>alert("تم انشاء الحساب بنجاح")</script>';
                      echo '<script>window.location="index.php"</script>';
                  }
                  else
                  {
                      echo '<script>alert("الباسورد غير مطابق  !")</script>';
                  }
              }
              else
              {
                  echo '<script>alert("خطأ في البريد الالكتروني!")</script>';
              }
          }
          else
          {
              echo '<script>alert("خطأ في كلمة المرور!")</script>';
          }
      }
      else
      {
          echo '<script>alert(" خطأ في الاسم او يحتوي علي حروف غير مقبولة !")</script>';
      }
  }
  else
  {
      echo '<script>alert("مسجل بالفعل!")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espana | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index2.php"><b>Espana</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="register.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="repassword" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
