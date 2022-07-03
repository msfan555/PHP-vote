<?php
$p="";
if(isset($_GET['p'])){
    $p="&p={$_GET['p']}";
}
$queryStr="";
if(isset($_GET['order'])){
    $queryStr="&order={$_GET['order']}&type={$_GET['type']}";
}

?>


<div>
    <ul class="list">
        <li class="list-header">
            <div>投票主題</div>

            <!-- 單/複選的排序 -->
            <?php
            // asc大到小排序 desc小到大排序
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div><a href="?order=multiple&type=desc<?=$p;?>">單/複選</a></div>
            <?php
            } else {
            ?>
                <div><a href="?order=multiple&type=asc<?=$p;?>">單/複選</a></div>
            <?php
            }
            ?>

            <!-- 投票期間的排序 -->
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div><a href="?order=end&type=desc<?=$p;?>">投票期間</a></div>
            <?php
            } else {
            ?>
                <div><a href="?order=end&type=asc<?=$p;?>">投票期間</a></div>
            <?php
            }
            ?>

            <!-- 剩餘天數的排序 -->
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div><a href="?order=remain&type=desc<?=$p;?>">剩餘天數</a></div>
            <?php
            } else {
            ?>
                <div><a href="?order=remain&type=asc<?=$p;?>">剩餘天數</a></div>
            <?php
            }
            ?>

            <!-- 投票人數的排序 -->
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div><a href="?order=total&type=desc<?=$p;?>">投票人數</a></div>
            <?php
            } else {
            ?>
                <div><a href="?order=total&type=asc<?=$p;?>">投票人數</a></div>
            <?php
            }
            ?>


        </li>
        <?php
        //確認是否需要排序
        $orderStr = '';
        if (isset($_GET['order'])) {
            $_SESSION['order']['col'] = $_GET['order']; //排序欄位         
            $_SESSION['order']['type'] = $_GET['type']; //排序方式

            if ($_GET['order'] == 'remain') {
                $orderStr = " ORDER BY DATEDIFF(`end`,now()) {$_SESSION['order']['type']}";
            } else {

                $orderStr = " ORDER BY `{$_SESSION['order']['col']}` {$_SESSION['order']['type']}"; //預設排序
            }
        }
        // 建立分頁所需的變數群
        $total = math('subjects', 'count', 'id');
        $div=3;
        $pages=ceil($total/$div);
        $now=isset($_GET['p'])?$_GET['p']:1;
        $start=($now-1)*$div;
        $page_rows=" limit $start,$div";
        // echo $total;


        $subjects = all('subjects', $orderStr . $page_rows);
        foreach ($subjects as $subject) {
            echo "<a href='?do=vote_result&id={$subject['id']}'>";
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
            echo "</li>";
            echo "</a>";
        }
        ?>
    </ul>
    <div class="text-center">
    <?php
    for($i=1;$i<=$pages;$i++){
        echo "<a href='?p={$i}{$queryStr}'>&nbsp;";
        echo $i;
        echo "&nbsp;</a>";
    }
    ?>

    </div>

</div>