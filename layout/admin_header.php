<div class="upper">
    <div>歡迎您 <?= $_SESSION['user']; ?></div>
    <div>
        <a href="?do=member_center">會員中心</a>
    </div>
    <div>
        <a href="../vote/login/logout.php">登出</a>
    </div>
</div>
<nav>

    <div>
        <a class="bar" href="?do=vote_list">投票列表</a>
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