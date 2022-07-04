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
        include "../layout/mem_nav.php";
        ?>
    </div>
    <div id="container">

        <h1>會員中心</h1>
        <h2>嗨 <?= $_SESSION['user']; ?>！ 歡迎回來</h2>
        <table>
            <tr>
                <td>帳號：</td>
                <td><?= $user['acc']; ?></td>
            </tr>
            <!-- <tr>
                    <td>密碼</td>
                    <td><?php // $user['pw']; 
                        ?></td>
                </tr> -->
            <tr>
                <td>姓名：</td>
                <td><?= $user['name']; ?></td>
            </tr>
            <tr>
                <td>生日：</td>
                <td><?= $user['birthday']; ?></td>
            </tr>
            <tr>
                <td>性別：</td>
                <td><?= ($user['gender'] == 0) ? '女性' : '男性'; ?></td>
            </tr>
            <tr>
                <td>地址：</td>
                <td><?= $user['addr']; ?></td>
            </tr>
            <td>教育程度：</td>
            <td>
                <?php
                $edu=$user['education'];
                switch($edu){
                    case "1":
                        echo "小學";
                        break;
                    case "2":
                        echo "中學";
                        break;
                    case "3":
                        echo "高中";
                        break;
                    case "4":
                        echo "大學";
                        break;
                    case "5":
                        echo "研究所";
                        break;
                }
                ?>
            </td>
            </tr>
            <tr>
                <td>email：</td>
                <td><?= $user['email']; ?></td>
            </tr>
        </table>
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