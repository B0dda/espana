<?php $title = "تسجيل الدخول" ?>
<?php
include_once('includes/head.php');
if (isset($_POST['signin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = date('Y-m-d H:i:s');

    if (DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
    {
        if (password_verify($password, DB::query('SELECT password FROM users WHERE email=:email', array(':email'=>$email))[0]['password']))
        {
                echo '<script>alert("تم تسجيل الدخول")</script>';
                echo '<script>window.location="index.php"</script>';
                $cstrong = True;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];

                DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id, :date)', array(':token'=>sha1($token), ':user_id'=>$user_id,':date'=>$date));

                setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

        } else {
                echo '<script>alert("خطأ في كلمة المرور")</script>';
                echo '<script>window.location="signin.php"</script>';
        }
    } else {
            echo '<script>alert( غير مسجل !")</script>';
            echo '<script>window.location="signin.php"</script>';
    }
}
include('includes/header.php');
?>

  <div class="container">

  </div>
  <div class="signin-form-container">
    <h1 class="heading mb-30">تسجيل الدخول</h1>
    <form action="signin.php" method="POST">
      <div class="group-input">
        <input type="email" class="bda-input" name="email" required>
        <span class="highlight"></span><span class="bar"></span>
        <label> <i class="fas fa-envelope"></i> البريد الإلكتروني </label>
      </div>

      <div class="group-input">
        <input type="password" class="bda-input" name="password" required>
        <span class="highlight"></span><span class="bar"></span>
        <label> <i class="fas fa-lock"></i> كلمة المرور </label>
      </div>

      <div class="group-buttons flex-1 mb-10">
        <input type="submit" class="xbutton p" name="signin" value="تسجيل الدخول">
      </div>

      <div class="group-buttons flex-1">
        <input type="button" class="xbuttonx p" value=" مستخدم جديد ؟" onClick="(function(){window.location='signup.php';return false;})();return false;">
      </div>

    </form>
  </div>
  <?php include('includes/footer.php'); ?>
