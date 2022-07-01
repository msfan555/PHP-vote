<div>
    <ul class="list">
        <li class="list-header">
            <div>投票主題</div>
            <div>單/複選</div>
            <div>投票期間</div>
            <div>剩餘天數</div>
            <div>投票人數</div>
        </li>
        <?php
        $subjects = all('subjects');
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

</div>