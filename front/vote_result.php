<?php
$subject = find("subjects", $_GET['id']);
$opts = all("options", ['subject_id' => $_GET['id']]);



?>
<h1 class="text-center"><?= $subject['subject']; ?></h1>
<div style="width:600px;margin:auto">
    <table class="result-table">
        <!-- <tr>
            <td>選項</td>
            <td>投票人數</td>
            <td>比例</td>
        </tr> -->
        <?php
        foreach ($opts as $opt) {
            //如果分母為0可能會error，所以判斷若為0則改成1，不為0則維持total 
            $total = ($subject['total'] == 0) ? 1 : $subject['total'];
            $rate = $opt['total'] / $total;

        ?>
            <tr>
                <td class="opt-text"><?= $opt['option']; ?></td>
                <!-- <td class="text-center"><?= $opt['total']; ?></td> -->
                <td>
                    <div class="text-center" style="height:24px;background:lightcoral;width:<?= 300 * $rate; ?>px">
                        <?= floor(($rate * 100)) . "%"; ?></div>
                </td>
            </tr>
        <?php

        }
        ?>
    </table>
    <div>總投票人數： <?= $subject['total']; ?></div>
    <div>
        <?php
        if (isset($_SESSION['user'])) {
        ?>
            <button onclick="location.href='?do=vote&id=<?= $_GET['id']; ?>'">我要投票</button>
        <?php
        } else {
        ?>
            <button onclick="location.href='../vote/login/login.php'">我要投票</button>

        <?php
        }
        ?>
    </div>
</div>