<?php

//原本的code

include_once "base.php";

// $sql="SELECT count(*) FROM `types`  WHERE `name`={$_POST['name']}";
// $chk=$pdo->query($sql)->fetchColumn();

$sql2="SELECT * FROM `types`  WHERE `name`={$_POST['name']}";
$chk2=$pdo->query($sql2)->fetchAll();

dd($chk2);
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