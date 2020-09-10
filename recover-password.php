<?php $title = "تغيير كلمة المرور" ?>
<?php
include('includes/header.php');
if (Login::isLoggedIn()) 
{
    $userid = Login::isLoggedIn();
} 
else 
{
    die('Not logged in!');
}
$tokenIsValid = False;
if (isset($_GET['token'])) 
{
  $token = $_GET['token'];
  if (DB::query('SELECT user_id FROM password_u_tokens WHERE token=:token', array(':token'=>sha1($token)))) 
  {
      $userid = DB::query('SELECT user_id FROM password_u_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
      $tokenIsValid = True;
      if (isset($_POST['change'])) 
      {
          $newpassword = $_POST['passworD'];
          $newpasswordrepeat = $_POST['repassworD'];
          if ($newpassword == $newpasswordrepeat) 
          {
              if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) 
              {
                DB::query('UPDATE users SET password=:password WHERE id=:userid', array(':password'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                echo '<script>alert("تم تغيير كلمة المرور")</script>';
                echo '<script>window.location="login.php"</script>';
                DB::query('DELETE FROM password_u_tokens WHERE user_id=:userid', array(':userid'=>$userid));
              }
          } else {
                  echo 'Passwords don\'t match!';
          }
      }
  } else {
          
  }
} else {
  
}
?>

  <div class="container">
  </div>
  <div class="signin-form-container" style="height:60%">
    <h1 class="heading mb-30">تغيير كلمة المرور</h1>
    <form action="signin.php" method="POST">
        <p class="mb-10">أنت على بعد خطوة واحدة فقط من كلمة مرورك الجديدة ، استعد كلمة مرورك الآن.</p>
      <div class="group-input">
        <input type="password" class="bda-input" name="passworD" required>
        <span class="highlight"></span><span class="bar"></span>
        <label> <i class="fas fa-lock"></i> كلمة المرور الجديدة </label>
      </div>

      <div class="group-input">
        <input type="password" class="bda-input" name="repassworD" required>
        <span class="highlight"></span><span class="bar"></span>
        <label> <i class="fas fa-lock"></i> تأكيد كلمة المرور </label>
      </div>
      
      <div class="group-buttons flex-1 mb-10">
        <input type="submit" class="xbutton p" name="change" value=" تغيير كلمة المرور ">
      </div>
    </form>
  </div>
  <?php include('includes/footer.php'); ?>
