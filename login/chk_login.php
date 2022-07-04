<?php

// include "connect.php";
// echo  $_POST['acc'];
// echo $_POST['pw'];

// $acc=$_POST['acc'];
// $pw=$_POST['pw'];

// //用count讓顯示結果是0或1，而不顯示整個陣列的內容
// $sql="SELECT count(*) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";
// // $user=$pdo->query($sql)->fetch();
// $user=$pdo->query($sql)->fetchColumn();

// // if($acc==$user['acc'] && $pw==$user['pw']){

// //判斷fetchColumn的結果，1或0，如果沒有帶資料的話是索引值0欄位的內容
// if($user){
//     //登入成功->會員中心
//     // echo $user; 
//     // 會顯示1
//     header("location:member_center.php"); 
// }else{
//     //登入失敗->會員登入+error msg
//     echo $user; 
//     // 會顯示0
//     header("location:login.php?error=帳號或密碼錯誤");
// }


// $acc=$_POST['acc'];
// $pw=md5($_POST['pw']);//接收帳號密碼並且把密碼改成MD5

// $sql="SELECT count(*) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";//尋找資料表的acc跟pw是否相符
// $chk=$pdo->query($sql)->fetchColumn();


// $error='';

// if($chk){//如果資料庫有這一筆資料的話就是Ture
//   $_SESSION['user']=$acc;//記錄使用者是誰 傳值到登入頁面
//   echo  $_SESSION['user'];
//   echo $pw;
// //   header("location:member_center.php");
//   // 登入成功導向會員頁
// }else{
//   $error="帳號密碼錯誤";
// //   header("location:login.php?error=$error");
//   // 登入失敗回到登入頁
// }

include "../api/base.php";//連線資料庫

$acc=$_POST['acc'];
$pw=md5($_POST['pw']);//接收帳號密碼並且把密碼改成MD5

$sql="SELECT count(*) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";//尋找資料表的acc跟pw是否相符
$chk=$pdo->query($sql)->fetchColumn();

// echo $sql;

$error='';

if($chk){//如果資料庫有這一筆資料的話就是Ture
  $_SESSION['user']=$acc;//記錄使用者是誰 傳值到登入頁面

  header("location:member_center.php");// 登入成功導向會員頁
}else{
  $error="帳號密碼錯誤";
  header("location:login.php?error=$error");// 登入失敗回到登入頁
}
?>
