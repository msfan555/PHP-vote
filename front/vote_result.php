<?php
$subject = find("subjects", $_GET['id']);
$opts = all("options", ['subject_id' => $_GET['id']]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票結果</title>
    <style>
        .result-box {
            width: 360px;
            padding: 2% 0 0;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 1rem;
        }

        .result-box div {
            color: #444;
            font-weight: bold;
        }

        .opt-box{
            margin: .5rem 0;
        }

        .opt-bar {
            padding:.26rem 0;
            height:25px;
            background: #ce8933;
            font-size: 14px;
        }

        .total{
            margin: 1.5rem 0 .5rem 0;
        }

        .govote {
            outline: 0;
            background: #5f386b;
            width: 25%;
            border: 0;
            padding: 12px;
            color: #f9c78b;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 5px 10px #ccc;
            border-radius: 5px;
            margin: 0.7rem 0.5rem 0.4rem 15rem;
        }
    </style>
</head>

<body>
    <div class="result-box">
        <div class="subject">
            <h2 class="text-center"><?= $subject['subject']; ?></h2>
        </div>
        <div style="margin: 0.5rem 0.1rem 0.5rem 0.8rem;">
            <?php
            foreach ($opts as $opt) {
                //如果分母為0可能會error，所以判斷若為0則改成1，不為0則維持total 
                $total = ($subject['total'] == 0) ? 1 : $subject['total'];
                $rate = $opt['total'] / $total;

            ?>
                <div class="opt-box">
                    <label class="opt-text"><?= $opt['option']; ?></label>
                    <!-- <?php //$opt['total']; 
                            ?> 投票人數 -->
                    <div class="text-center opt-bar" style="width:<?= 340 * $rate; ?>px">
                        <?= floor(($rate * 100)) . "%"; ?></div>
                </div>
            <?php

            }
            ?>
            <div class="total">
                <label>總投票人數</label>
                <span class="total">
                    <?= $subject['total']; ?>
                </span>
            </div>
        </div>
        <div class="btn">
            <?php
            if (isset($_SESSION['acc'])) {
            ?>
                <button class="govote" onclick="location.href='?do=vote&id=<?= $subject['id']; ?>'">我要投票</button>
            <?php
            } else {
            ?>
                <button class="govote" onclick="location.href='../vote/login/login.php'">我要投票</button>

            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>