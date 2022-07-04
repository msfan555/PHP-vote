<?php
include "../api/base.php"; //連接資料庫

$sql = "SELECT * FROM `users` WHERE acc='{$_SESSION['user']}'";
$user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC); //導出資料
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票中心</title>
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div id="header">
        <?php
        include "../layout/header.php";
        include "../layout/mem_cen_nav.php";
        ?>
    </div>
    <div id="container">

        <h1>會員中心</h1>
        <h2>嗨 <?= $_SESSION['user'];?>！ 歡迎回來</h2>
        <div>
            <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?= $user['id']; ?>"> <!-- 隱藏按鈕帶參數過去 -->
                <input type="submit" class="logbtn" value="編輯資料">
        </div>
    </div>

    <div>
        <?php
        include "../layout/footer.php";
        ?>
    </div>

</body>

</html>