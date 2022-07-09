<?php

//原本的code

include_once "base.php";


// 檢查是否有$_POST的值
foreach($_POST as $key => $value){
//   echo "hello world";
  echo "<br>";
  echo "key=>".$key;
  echo "<br>";
  echo "value=>".$value;
}
// exit ();

$typeName=$_POST['name'];

$sql="SELECT * FROM `types`  WHERE `name`='$typeName'";
$chk=$pdo->query($sql)->fetchAll();



// $sql2="SELECT * FROM `types`  WHERE `name`={$_POST['name']}";
// $chk2=$pdo->query($sql2)->fetchAll();

dd($chk);
exit();



$error='';

if($chk){
    $error="這是重複的分類，請輸入其他分類";
    header("location:../back/admin_type.php?error=$error");
}else{
    $_POST['id']=$typeId;
    $_POST['name']="$typeName";
    save('types',['name'=>$_POST['name']]);
}

header("location:../back/admin_type.php");
?>