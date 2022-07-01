<?php
$subject = find("subjects", $_GET['id']);
$opts = all("options", ['subject_id' => $_GET['id']]);



?>
<h1 class="text-center"><?= $subject['subject']; ?></h1>
<div style="width:600px;margin:auto">
    <div>總投票人數： <?= $subject['total']; ?></div>
    <table>
        <tr>
            <td>選項</td>
            <td>投票人數</td>
            <td>比例</td>
        </tr>
        <?php
        foreach ($opts as $opt) {
            //如果分母為0可能會error，所以判斷若為0則改成1，不為0則維持total 
            $total = ($subject['total'] == 0) ? 1 : $subject['total'];

        ?>
            <tr> 
                <td><?= $opt['option']; ?></td>
                <td class="text-center"><?= $opt['total']; ?></td>
                <td class="text-center"><?= round(($opt['total'] / $total)*100)."%";?></td>
            </tr>
        <?php

        }
        ?>
    </table>
    <button onclick="location.href='?do=vote&id=<?=$_GET['id'];?>'">我要投票</button>
</div>