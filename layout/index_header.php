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
        <a class="bar-end" href="../vote/admin.php">投票管理</a>
    </div>
</nav>