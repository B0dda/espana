<?php $title = "تسجيل الدخول" ?>
<?php include('includes/header.php'); ?>
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
  <?php include('includes/footer.php'); ?>
