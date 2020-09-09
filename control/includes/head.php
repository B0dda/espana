<?php
include('./classes/Login.php');
include_once("./classes/DB.php");
if (Login::isLoggedIn())
{
  $userid = Login::isLoggedIn();
  $fullname = DB::query('SELECT name FROM admins WHERE id=:id', array(':id'=>$userid))[0]['name'];
}
else
{
    $fullname = "Admin";
}
$total_users = DB::query('SELECT COUNT(id) AS cnt FROM users')[0]['cnt'];

$total_orders = DB::query('SELECT COUNT(id) AS cnt FROM orders')[0]['cnt'];

 ?>
