<div class="upper">
    <div>
        <?php
        if (isset($_SESSION['user'])) {
        ?>
            <a href="../vote/login/logout.php">登出</a>
        <?php
        } else {
        ?>
            <a href="../vote/login/login.php">登入</a>
        <?php
        }
        ?>
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