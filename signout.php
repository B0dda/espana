<?php $title = "تسجيل الدخول" ?>
<?php
include_once('includes/head.php');
if (Login::isLoggedIn()) 
{
    $userid = Login::isLoggedIn();
} 
else 
{
    die('Not logged in!');
}

if (isset($_POST['signout'])) 
{

    if (isset($_POST['alldevices'])) 
    {

        DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
        echo '<script>alert("تم تسجيل الخروج  !")</script>';  
        echo '<script>window.location="index.php"</script>';

    } 
    else 
    {
        if (isset($_COOKIE['SNID'])) 
        {
            DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
            echo '<script>alert("تم تسجيل الخروج  !")</script>';  
            echo '<script>window.location="index.php"</script>';
        }
            setcookie('SNID', '1', time()-3600);
            setcookie('SNID_', '1', time()-3600);
    }

}
include('includes/header.php');
?>

  <div class="container">

  </div>
  <div class="signin-form-container" style="height:40%">
    <h1 class="heading mb-30">تسجيل الخروج</h1>
    <form action="signout.php" method="POST">
        <input class="bda-input" type="checkbox" name="alldevices" value="alldevices">الخروج من كل الاجهزة ؟<br />
        <div class="group-buttons flex-1" style="margin-top:50px">
            <input type="submit" class="xbutton p" name="signout" value="تسجيل الخروج">
        </div>
    </form>
  </div>
  <?php include('includes/footer.php'); ?>
