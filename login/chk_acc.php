<?php

include "../api/base.php";//連線資料庫

$acc=$_POST['acc'];
$email=$_POST['email'];

$sql="SELECT * FROM `users` WHERE `acc`='$acc' && `email`='$email'";//尋找資料表的acc跟email是否相符
$chk=$pdo->query($sql)->fetchColumn();

dd($chk);

// echo $chk;
echo $sql;
exit();

$error='';

if($chk){//如果資料庫有這筆資料的話就是Ture
  $_SESSION['acc']=$acc;
  $_SESSION['email']=$email;

  //header("location:reset_pw.php");//確認資料後導向密碼重置頁面
}else{
  $error="您輸入的資料有誤，請重新確認";
  //header("location:forget.php?error=$error");// 確認資料失敗回到忘記密碼頁
}
?>