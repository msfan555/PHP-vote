<?php
include_once "base.php";

//先檢查分類名稱是否有重複

if($_POST['name']==$type['name']){
    echo "這是重複的分類，請輸入其他分類";
}else{
    save('types',['name'=>$_POST['name']]);

}

header("location:../back/admin_type.php");
?>
