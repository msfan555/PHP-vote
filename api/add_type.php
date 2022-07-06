<?php
include_once "base.php";

//先檢查分類名稱是否有重複

save('types',['name'=>$_POST['name']]);
header("location:../back/admin_type.php");
?>