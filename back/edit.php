<!-- 在admin.php已經引入base檔案，所以這裡不用再引入，
因為這裡是admin.php的container -->

<?php

//取得主題id
$id = $_GET['id'];

//從資料表中撈出主題資料
$subjs = find('subjects', $id);

//從資料表中撈出該主題的所有選項資料
$opts = all('options', ['subject_id' => $id]);
// dd($row);
// dd($opts);


?>

<!-- 載入到back.php的container就不用再處理header footer -->
<!-- 頁面 或 資料庫讀出資料 -->
<form action="../vote/api/edit_vote.php" method="post">
    <div>
        <label for="types">選擇分類</label>
        <select name="types" id="types">
            <?php
            $types = all("types");
            foreach ($types as $type) {
                $selected=($subjs['type_id']==$type['id'])?'selected':'';
                echo "<option value='{$type['id']}' $selected>";
                echo $type['name'];
                echo "</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="subject">投票主題</label>
        <input type="text" name="subject" id="subject" value="<?= $subjs['subject']; ?>">
        <!-- label的for對應input的id 所以都要設成subject -->
        <input type="button" value="新增選項" onclick="addOpt()">
        <input type="hidden" name="subject_id" value="<?= $subjs['id']; ?>">
    </div>
    <div id="selector">
        <input type="radio" name="multiple" value="0" <?= ($subjs['multiple'] == 0) ? 'checked' : ''; ?>>
        <label>單選</label>
        <input type="radio" name="multiple" value="1" <?= ($subjs['multiple'] == 1) ? 'checked' : ''; ?>>
        <label>複選</label>
    </div>
    <div id="options">
        <?php
        foreach ($opts as $opt) {

        ?>
            <div>
                <label>選項</label><input type="text" name="option[<?= $opt['id']; ?>]" value="<?= $opt['option']; ?>">
                <!-- 同一個name但是有多筆資料的時候，option+[]使其變成陣列 -->
            </div>
        <?php
        }
        ?>
    </div>
    <input type="submit" value="修改">

</form>

<script>
    function addOpt() {
        let opt = `<div><label>選項</label><input type="text" name="option[]">`;
        let opts = document.getElementById('options').innerHTML;
        opts = opts + opt;
        document.getElementById('options').innerHTML = opts;
    }
</script>