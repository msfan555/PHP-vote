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
    <title>投票管理中心</title>
    <link rel="stylesheet" href="../css//basic.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div id="header">
        <?php
        include "../layout/header.php";
        include "../layout/back_nav.php";
        ?>
    </div>
    <div id="container">
        <div>
            <ul>
                <li class="list-header">
                    <div>投票主題</div>
                    <div>單/複選</div>
                    <div>投票期間</div>
                    <div>剩餘天數</div>
                    <div>投票人數</div>
                    <div>功能</div>
                </li>
                <?php
                $subjects = all('subjects');
                foreach ($subjects as $subject) {
                    echo "<li class='list-items'>";
                    echo "<div>{$subject['subject']}</div>";
                    if ($subject['multiple'] == 0) {
                        echo "<div class='text-center'>單選</div>";
                    } else {
                        echo "<div class='text-center'>複選</div>";
                    }
                    echo "<div class='text-center'>";
                    echo $subject['start'] . " ~ " . $subject['end'];
                    echo "</div>";

                    echo "<div class='text-center'>";
                    $today = strtotime("now");
                    $end = strtotime($subject['end']);
                    if (($end - $today) > 0) {
                        $remain = floor(($end - $today) / (60 * 60 * 24));
                        echo "投票倒數" . $remain . "天結束";
                    } else {
                        echo "<span style='color:grey'>投票結束</span>";
                    }
                    echo "</div>";
                    echo "<div class='text-center'>{$subject['total']}</div>";
                    echo "<div class='text-center'>";
                    echo "<a class='edit' href='?do=edit&id={$subject['id']}'>編輯</a>";
                    echo "<a class='dele' href='?do=dele&id={$subject['id']}'>刪除</a>";
                    echo "</div>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div>
        <?php
        include "../layout/footer.php";
        ?>
    </div>
</body>

</html>