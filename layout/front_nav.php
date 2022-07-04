

<nav>
<!-- <a href="index.php">回首頁</a> -->
<?php
if(isset($_SESSION['user'])){
    ?>
<a href="../vote/login/logout.php">登出</a>
<?php
}else{
?>
<a href="../vote/login/login.php">登入</a>
<?php
}
?>
</nav>

