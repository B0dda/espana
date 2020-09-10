<?php include_once('includes/head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="layout/js/all.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="./layout/css/master.css">
  <title><?php echo $title; ?></title>
</head>
<body>
<div id="header">
  <div class="logo">
    <a href="index.php"> <img src="layout/png/Logo.png"></a>
  </div>
  <div class="nav">
    <div class="top flex fd-rr">
      <?php
          if (Login::isLoggedIn())
          {
            $userid = Login::isLoggedIn();
            $fname = DB::query('SELECT fname FROM users WHERE id=:id', array(':id'=>$userid))[0]['fname'];
            print "<div class='login flex'> مرحبا , $fname
            <div class='xbuttonx' style='margin-right:30px'>
                        <a href='signout.php'><i class='fas fa-user-plus m-5'></i>تسجيل الخروج</a>
                      </div></div>
            ";
          }
          else
          {
            print" <div class='login flex'>
                      <div class='xbuttonx'>
                        <a href='signup.php'><i class='fas fa-user-plus m-5'></i>تسجيل</a>
                      </div>
                      <div class='xbuttonx mr-5'>
                        <a href='signin.php'><i class='fas fa-sign-in-alt m-5'></i>دخول</a>
                      </div>
                    </div>";
          }
      ?>
    </div>
    <div class="center flex a-c">
      <div class="search flex w-100">
        <div class="cat-button" style="text-align:center;">
          <?php
          if(isset($_GET['category'])){
            $cat = DB::query('SELECT * FROM categories WHERE id=:id',array(':id'=>$_GET['category']));
            if($cat){
              echo $cat[0]['category'];
            }
          }else{
              ?>
          جميع الأقسام
          <?php
      }
       ?>
          <div class="icon">
            <i class="fas fa-caret-down"></i>
          </div>
          <menu>

                <div class="item"><b>جميع الأقسام</b></div>

            <?php $categories = DB::query('SELECT * FROM categories');
            foreach ($categories as $cat) {
              ?>
              <a href="search.php?category=<?php echo $cat['id']; ?>"><div class="item"><?php echo $cat['category']; ?></div></a>
              <?php
            }
             ?>
          </menu>
        </div>
        <form action="search.php" class="flex f-1" method="get">
          <input type="text" class="input" name="q" placeholder="ماذا تبحث عن؟">
          <button type="submit"> <i class="fas fa-search"></i> </button>
        </form>
      </div>
    </div>
    <div class="bottom flex nav-buttons j-c">

      <?php
      $categories = DB::query('SELECT * FROM categories');
      foreach ($categories as $cat) {
        ?>
        <div class="item"><?php echo $cat['category']; ?></div>
        <?php
      }
       ?>
      <?php
       ?>
      <div class="sub-menu">
        <?php foreach ($categories as $cat) {
          $menus = DB::query('SELECT * FROM branchone WHERE category = :category',array(':category'=>$cat['id']));
          ?>
          <div class="content">
            <?php foreach($menus as $menu){
              ?>
              <div class="menu">
                <div class="item"><a href="#"><?php echo $menu['branchOne']; ?></a></div>
                <?php
              for ($j=0; $j <rand(1,10) ; $j++) {
                ?>
                <div class="item"><a href="#">مثال</a></div>
                <?php
              }
              ?>
              </div>
              <?php
            } ?>

            <div class="menu extra"></div>
            <div class="menu extra"></div>
            <div class="menu extra"></div>
            <div class="menu extra"></div>
          </div>
          <?php
        } ?>
      </div>
      <script type="text/javascript">
        var navSubMenus = document.querySelectorAll(".nav-buttons .content");
        var navCategories = document.querySelectorAll(".nav-buttons .item");
        for(let i = 0; i<navCategories.length; i++){
          document.addEventListener('mouseover', function(e){
            if(navSubMenus[i])
            if(e.target !== navCategories[i] && e.target !== navSubMenus[i] && !(navSubMenus[i].contains(e.target))){
              if(navSubMenus[i]){
                navSubMenus[i].style.display = "none";
              }
            }
          });
          navCategories[i].addEventListener('mouseover',function(){
            if(navSubMenus[i]){
              navSubMenus[i].style.display = "flex";
            }
          });
        }
      </script>
    </div>

  </div>
</div>
