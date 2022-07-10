<div class="upper">
    <div>            <?php
            if (isset($_SESSION['acc'])) {
            ?>
                    歡迎您 <?= $_SESSION['name']; ?>
            <?php
            } 
            ?>
        </div>

    <div>
        <div>
            <?php
            if (isset($_SESSION['acc'])) {
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
</div>
<nav>

    <div>
        <a class="bar" href="../vote/index.php">投票列表</a>
    </div>
    <div>
        <a href="?do=member_center">會員中心</a>
    </div>
</nav>