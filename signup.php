<?php include('includes/header.php'); ?>
<?php
$title = "إنشاء حساب";

if ( isset( $_POST['submit'] ) )
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];

  if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
  {
      if (strlen($fname) >= 3 && strlen($fname) <= 30)
      {
          if (strlen($lname) >= 3 && strlen($lname) <= 30)
          {
              if (strlen($password) >= 8 && strlen($password) <= 60)
              {
                  if (filter_var($email, FILTER_VALIDATE_EMAIL))
                  {
                      if($password == $repassword)
                      {
                          DB::query('INSERT INTO users VALUES(\'\',:fname,:lname,:email,:phone,:password)',
                          array(':fname'=>$fname,
                                ':lname'=>$lname,
                                ':email'=>$email,
                                ':phone'=>$phone,
                                ':password'=>password_hash($password, PASSWORD_BCRYPT)));
                          echo '<script>alert("تم انشاء الحساب بنجاح! يمكن الآن تسجيل الدخول")</script>';
                          echo '<script>window.location="signin.php"</script>';
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
              echo '<script>alert("خطأ في اسم المستخدم!")</script>';
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
  <div class="container">
  </div>
  <div class="signup-form-container">
    <h1 class="heading mb-10">إنشاء حساب</h1>
    <form action="signup.php" method="POST">
      <div class="two-in-one">
        <div class="group-input flex-1">
          <input type="text" class="bda-input" name="fname" id="fname" oninput="word()" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-signature"></i> الإسم الأول </label>
          <p id="fnameError"></p>
        </div>
        <div class="group-input flex-1">
          <input type="text" class="bda-input" name="lname" id="lname" oninput="word()" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-signature"></i> الإسم الأخير </label>
          <p id="lnameError"></p>
        </div>
      </div>
      <div class="two-in-one">
        <div class="group-input flex-1">
          <input type="email" class="bda-input" name="email" id="email" oninput="word()" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-envelope"></i> البريد الإلكنروني </label>
          <p id="emailError"></p>
        </div>
        <div class="group-input flex-1">
          <input type="number" class="bda-input" name="phone" id="phone" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-phone"></i> رقم الهاتف </label>
        </div>
      </div>
      <div class="two-in-one">
        <div class="group-input flex-1">
          <input type="password" class="bda-input" name="password" id="password" oninput="passCheck(this.value)" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-lock"></i> كلمة المرور </label>
          <p id="lower"></p>
        </div>
        <div class="group-input flex-1">
          <input type="password" class="bda-input" name="repassword" id="repassword" oninput="passVer(this.value)" required>
          <span class="highlight"></span><span class="bar"></span>
          <label> <i class="fas fa-lock"></i> إعادة كلمة المرور </label>
          <p id="rePass"></p>
        </div>
      </div>

      <div class="group-buttons flex-1 mb-10">
        <input type="submit" class="xbutton p" name="submit" id="create" value="إنشاء حساب">
      </div>

      <div class="group-buttons flex-1">
        <input type="button" class="xbuttonx p" value="لديك حساب بالفعل ؟" onClick="(function(){window.location='signin.php';return false;})();return false;">
      </div>
    </form>
  </div>
  <?php include('includes/footer.php'); ?>
