<?php $title = "تسجيل الدخول" ?>
<?php include('includes/header.php'); ?>

  <div class="container">

  </div>
  <div class="signin-form-container">
    <h1 class="heading mb-30">تسجيل الدخول</h1>
    <form action="signup.php" method="POST">
      <div class="group-input">
        <input type="email" class="bda-input" required>
        <span class="highlight"></span><span class="bar"></span>
        <label> <i class="fas fa-envelope"></i> البريد الإلكتروني </label>
      </div>

      <div class="group-input">
        <input type="password" class="bda-input" required>
        <span class="highlight"></span><span class="bar"></span>
        <label> <i class="fas fa-lock"></i> كلمة المرور </label>
      </div>

      <div class="group-buttons flex-1 mb-10">
        <input type="submit" class="xbutton p" value="تسجيل الدخول">
      </div>

      <div class="group-buttons flex-1">
        <input type="button" class="xbuttonx p" value=" مستخدم جديد ؟" onClick="(function(){window.location='signup.php';return false;})();return false;">
      </div>

    </form>
  </div>
</body>

</html>
