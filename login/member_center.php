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
<style>
    .mem-box {
        width: 300px;
        padding: 4% 0 0;
        margin: auto;
    }

    h2 {
        text-align: center;
        color: #444;
        margin-bottom: 1rem;
    }

    .mem-label {
        color: gray;
        font-weight: bold;
    }

    .mem-box td{
        margin: .2rem 0;
    }

    .mem-box .mem-data {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #fcfcfc;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 13px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .mem-send {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 12px;
        color: #FFFFFF;
        font-size: 18px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
    }
</style>

<body>
    <div id="header">
    <?php
    include "../layout/header.php";
    include "../layout/mem_nav.php";
    ?>
    </div>
    <div id="container">
         <h2>嗨 <?=$_SESSION['user']; 
                ?>！ 歡迎回來</h2>
    <div class="mem-box">
        <table>
            <h2>會員資料</h2>
            <tr>
                <td class="mem-label">帳號</td>
                <td class="mem-data"><?= $user['acc']; ?></td>
            </tr>
            <!-- <tr>
                    <td>密碼</td>
                    <td><?php // $user['pw']; 
                        ?></td>
                </tr> -->
            <tr>
                <td class="mem-label">姓名</td>
                <td class="mem-data"><?= $user['name']; ?></td>
            </tr>
            <tr>
                <td class="mem-label">生日</td>
                <td class="mem-data"><?= $user['birthday']; ?></td>
            </tr>
            <tr>
                <td class="mem-label">性別</td>
                <td class="mem-data"><?= ($user['gender'] == 0) ? '女性' : '男性'; ?></td>
            </tr>
            <td class="mem-label">教育程度</td>
            <td class="mem-data">
                <?php
                $edu = $user['education'];
                switch ($edu) {
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
                <td class="mem-label">email</td>
                <td class="mem-data"><?= $user['email']; ?></td>
            </tr>
        </table>
        <div>
            <form action="./login/edit.php" method="post">
                <input type="hidden" name="id" value="<?= $user['id']; ?>"> <!-- 隱藏按鈕帶參數過去 -->
                <input class="mem-send" type="submit" class="logbtn" value="編輯資料">
        </div>
    </div>

    <!-- <div>
        <?php
        // include "../layout/footer.php";
        ?>
    </div> -->




</body>

</html>