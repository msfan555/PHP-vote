<?php

include_once "../api/base.php";

$pw=md5($_POST['pw']);

$sql="INSERT INTO `users` (`acc`,`pw`,`name`,`birthday`,`gender`,`education`,`email`) 
values('{$_POST['acc']}','$pw','{$_POST['name']}','{$_POST['birthday']}','{$_POST['gender']}','{$_POST['education']}','{$_POST['email']}');";

$pdo->exec($sql);

header('location:login.php');
?>