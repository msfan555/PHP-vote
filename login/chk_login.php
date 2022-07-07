<?php

include "../api/base.php";//連線資料庫


$adminAcc=$_POST['acc'];
$adminPw=($_POST['pw']);


$userAcc=$_POST['acc'];
$userPw=md5($_POST['pw']);//接收帳號密碼並且把密碼改成MD5


// 測試是否有收到資料
echo $userAcc=$_POST['acc'];
echo $userPw=md5($_POST['pw']);
// exit ();


// echo $acc;
// echo $pw;
// exit ();

$sql="SELECT count(*) FROM `users` WHERE `acc`='$userAcc' && `pw`='$userPw'";//尋找資料表的acc跟pw是否相符
$chk=$pdo->query($sql)->fetchColumn();

echo $sql;
echo "<hr>";
echo $chk;


echo "<hr>";
echo "<hr>";


$sql2="SELECT * FROM `users` WHERE `acc`='$userAcc' && `pw`='$userPw'";
$chk2=$pdo->query($sql2)->fetchAll();

$userId=$chk2[0]['id'];
$userName=$chk2[0]['name'];

// $userId=

echo $sql2;
echo "<hr>";
dd($chk2);
echo "<hr>";


echo "user_id=";
echo $userId;
echo "user_name=";
echo $userName;


echo "<hr>";
echo "SESSION['acc']=";
echo $_SESSION['acc'];
echo "<br>";
echo "SESSION['id']=";
echo $_SESSION['id'];
echo "<br>";
echo "SESSION['name']=";
echo $_SESSION['name'];
echo "<hr>";
echo "userAcc=";
echo "$userAcc";
echo "<br>";
echo "userId=";
echo "$userId";
echo "<br>";
echo "userName=";
echo "$userName";
// exit();



$error='';

//管理員跟一般會員分流
// if($adminAcc == 'admin' && $adminPW == "admin"){
//   $_SESSION['acc']=$adminAcc;
//   $_SESSION['id']="$member_id";
//   $_SESSION['name']="$member_name";
//   header("location:../back.php");
// }elseif($chk){

if($chk){//如果資料庫有這一筆資料的話就是Ture
  $_SESSION['acc']=$userAcc;//記錄使用者是誰 傳值到登入頁面
  $_SESSION['id']=$userId;
  $_SESSION['name']="$userName";

  header("location:../admin.php");// 登入成功導向會員頁
}else{
  $error="帳號密碼錯誤";
  header("location:login.php?error=$error");// 登入失敗回到登入頁
}
?>
