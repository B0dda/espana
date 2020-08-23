<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="layout/css/master.css">
  <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
  <title>إنشاء حساب | اسبانا</title>
</head>

<body id="signin">
  <div class="container">

  </div>
  <div class="signup-form-container">
    <h1 class="heading mb-10">إنشاء حساب</h1>
    <form action="signup.php" method="POST">
      <div class="two-in-one">
        <div class="group-input flex-1">
          <input type="text" class="bda-input" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-signature"></i> الإسم الأول </label>
        </div>
        <div class="group-input flex-1">
          <input type="text" class="bda-input" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-signature"></i> الإسم الأخير</label>
        </div>
      </div>
      <div class="two-in-one">
        <div class="group-input flex-1">
          <input type="email" class="bda-input" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-envelope"></i> البريد الإلكنروني</label>
        </div>
        <div class="group-input flex-1">
          <input type="number" class="bda-input" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-phone"></i> رقم الهاتف</label>
        </div>
      </div>
      <div class="two-in-one">
        <div class="group-input flex-1">
          <input type="password" class="bda-input" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-lock"></i> كلمة المرور</label>
        </div>
        <div class="group-input flex-1">
          <input type="password" class="bda-input" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-lock"></i> إعادة كلمة المرور</label>
        </div>
      </div>

      <div class="group-buttons flex-1 mb-10">
        <input type="submit" class="xbutton p" value="إنشاء حساب">
      </div>

      <div class="group-buttons flex-1">
        <input type="button" class="xbuttonx p" value="لديك حساب بالفعل ؟" onClick="(function(){window.location='signin.php';return false;})();return false;">
      </div>


    </form>
  </div>
</body>

</html>