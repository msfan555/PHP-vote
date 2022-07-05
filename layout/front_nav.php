

<nav>
<!-- <a href="index.php">回首頁</a> -->
<!-- <a href="../vote/admin.php">投票管理</a>
<a href="../vote/back/add_vote.php">新增投票</a>
<a href="../vote/back/admin_type.php">分類管理</a>
<a href="../vote/login/member_center.php">會員中心</a> -->
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

