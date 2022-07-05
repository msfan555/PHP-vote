<?php
$p = "";
if (isset($_GET['p'])) {
    $p = "&p={$_GET['p']}";
}
$queryStr = "";
if (isset($_GET['order'])) {
    $queryStr = "&order={$_GET['order']}&type={$_GET['type']}";
}
$queryFilter="";
if (isset($_GET['filter'])) {
    $queryFilter = "&filter={$_GET['filter']}";
}

?>
<div>
    <label for="types">分類</label>
    <select name="types" id="types" onchange="location.href=`?filter=${this.value}<?=$queryStr;?>`">
        <option value="0">全部</option>
        <?php
        $types = all("types");
        foreach ($types as $type) {
            $selected=(isset($_GET['filter']) && $_GET['filter']==$type['id'])?'selected':'';
            echo "<option value='{$type['id']}' $selected>";
            echo $type['name'];
            echo "</option>";
        }

        ?>
    </select>
</div>


<div>
    <ul class="back-list">
        <li class="back-list-header">
            <div>投票主題</div>

            <!-- 單/複選的排序 -->
            <?php
            // asc大到小排序 desc小到大排序
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div><a href="?order=multiple&type=desc<?= $p; ?><?=$queryFilter;?>">單/複選</a></div>
            <?php
            } else {
            ?>
                <div><a href="?order=multiple&type=asc<?= $p;?><?=$queryFilter;?>">單/複選</a></div>
            <?php
            }
            ?>

            <!-- 投票期間的排序 -->
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div><a href="?order=end&type=desc<?= $p; ?><?=$queryFilter;?>">投票期間</a></div>
            <?php
            } else {
            ?>
                <div><a href="?order=end&type=asc<?= $p; ?><?=$queryFilter;?>">投票期間</a></div>
            <?php
            }
            ?>

            <!-- 剩餘天數的排序 -->
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div><a href="?order=remain&type=desc<?= $p;?><?=$queryFilter;?>">剩餘天數</a></div>
            <?php
            } else {
            ?>
                <div><a href="?order=remain&type=asc<?= $p;?><?=$queryFilter;?>">剩餘天數</a></div>
            <?php
            }
            ?>

            <!-- 投票人數的排序 -->
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div><a href="?order=total&type=desc<?= $p;?><?=$queryFilter;?>">投票人數</a></div>
            <?php
            } else {
            ?>
                <div><a href="?order=total&type=asc<?= $p; ?><?=$queryFilter;?>">投票人數</a></div>
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

        $filter = [];
        if (isset($_GET['filter'])) {
            if(!$_GET['filter']==0){
                $filter = ['type_id' => $_GET['filter']];
               }
        }

        // 建立分頁所需的變數群
        $total = math('subjects', 'count', 'id', $filter);
        $div = 10;
        $pages = ceil($total / $div);
        $now = isset($_GET['p']) ? $_GET['p'] : 1;
        $start = ($now - 1) * $div;
        $page_rows = " limit $start,$div";
        // echo $total;

        $subjects = all('subjects', $filter, $orderStr . $page_rows);
        foreach ($subjects as $subject) {
            echo "<a href='?do=vote_result&id={$subject['id']}'>";
            echo "<li class='back-list-items'>";
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
        if ($pages > 1) {
            for ($i = 1; $i <= $pages; $i++) {
                echo "<a href='?p={$i}{$queryStr}{$queryFilter}'>&nbsp;";
                echo $i;
                echo "&nbsp;</a>";
            }
        }
        ?>

    </div>

</div>