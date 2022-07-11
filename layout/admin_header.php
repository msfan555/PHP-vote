<div class="upper">
    <div>歡迎您 <?= $_SESSION['acc']; ?></div>
    <div>
        <a href="?do=member_center">個人資料</a>
    </div>
    <div>
        <a href="../vote/login/logout.php">登出</a>
    </div>
</div>
<nav>

    <div>
        <a class="bar" href="../vote/index.php">投票列表</a>
    </div>
    <div>
        <a class="bar" href="?do=admin_vote">投票管理</a>
    </div>
    <div>
        <a class="bar" href="?do=add_vote">新增投票</a>
    </div>
    <div>
        <a class="bar-end" href="?do=admin_type">分類管理</a>
    </div>

</nav>