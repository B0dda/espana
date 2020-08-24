<?php include_once('includes/head.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./layout/css/master.css">
  <title><?php echo $title; ?></title>
</head>
<body>
<div id="header">
  <div class="logo">
    <img src="layout/png/logo.png">
  </div>
  <div class="nav">
    <div class="top flex fd-rr">
      <div class="login flex">
        <div class="xbuttonx">
          <a href="#"><i class="fas fa-user-plus m-5"></i>تسجيل</a>
        </div>
        <div class="xbuttonx mr-5">
          <a href="#"><i class="fas fa-sign-in-alt m-5"></i>دخول</a>
        </div>
      </div>
    </div>
    <div class="center flex a-c">
      <div class="search flex w-100">
        <div class="cat-button">
          جميع الأقسام
          <div class="icon">
            <i class="fas fa-caret-down"></i>
          </div>
          <menu>
            <div class="item"><b>جميع الأقسام</b></div>
            <div class="item">جميع الأقسام</div>
            <div class="item">جميع الأقسام</div>
            <div class="item">جميع الأقسام</div>
          </menu>
        </div>


        <form action="search" class="flex f-1" method="get">
          <input type="text" class="input" name="q" placeholder="ماذا تبحث عن؟">
          <button type="submit"> <i class="fas fa-search"></i> </button>
        </form>
      </div>
    </div>
    <div class="bottom flex nav-buttons j-c">
      <?php for ($i=0; $i <7 ; $i++) {
        ?>
        <div class="item">الأقسام</div>
        <?php
      } ?>

      <div id="page-overlay"></div>
      <div class="sub-menu">
        <?php for ($i=0; $i <7 ; $i++) {
          ?>
          <div class="content">
            <?php for($k = 0; $k<rand(1,10); $k++){
              ?>
              <div class="menu">
                <?php
              for ($j=0; $j <rand(1,10) ; $j++) {
                ?>
                <div class="item"><a href="#">XXXX</a></div>
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
                document.getElementById('page-overlay').style.display = "none";
              }
            }else{
              document.getElementById('page-overlay').style.display = "block";
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
