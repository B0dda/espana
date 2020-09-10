<?php $title = "إسترجاع كلمة المرور" ?>
<?php
include('includes/header.php');
include('classes/Mail.php');
if (isset($_POST['reset'])) 
{
  $cstrong = True;
  $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
  $email = $_POST['email'];
  if(DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
  {
      $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
      DB::query('INSERT INTO password_u_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
      Mail::sendMail('هل نسيت كلمه السر!', "<!DOCTYPE html><html><body><a href='http://localhost/espana/recover-password.php?token=$token'>رابط استرجاع كلمة المرور</a></html></body>", $email);
      echo '<script>alert(" تم ارسال رابط لتغيير كلمة المرور علي البريد اللكتروني")</script>';
      header('location: login.php');
  }
  else
  {
      echo '<script>alert(" الايميل غير مسجل")</script>';
  }
}
?>

  <div class="container">
  </div>
  <div class="signin-form-container" style="height:50%">
    <h1 class="heading mb-30">إسترجاع كلمة المرور</h1>
    <form action="signin.php" method="POST">
        <p class="mb-10">هل نسيت كلمة المرور الخاصة بك؟ هنا يمكنك بسهولة استرداد كلمة المرور الجديدة.</p>
      <div class="group-input">
        <input type="email" class="bda-input" name="email" required>
        <span class="highlight"></span><span class="bar"></span>
        <label> <i class="fas fa-envelope"></i> البريد الإلكتروني </label>
      </div>
      
      <div class="group-buttons flex-1 mb-10">
        <input type="submit" class="xbutton p" name="reset" value=" إرسال ">
      </div>
    </form>
  </div>
  <?php include('includes/footer.php'); ?>
