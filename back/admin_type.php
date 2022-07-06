<!-- 分類管理 -->
<?php
include_once "../vote/api/base.php";
?>
<h2>分類管理</h2>

<form action="../vote/api/edit_type.php" method="post">
    <h2>編輯分類</h2>
    <label for="">所有分類</label>
    <?php
    $types = all("types");
    foreach ($types as $type) {
        echo "<div value='{$type['id']}'>";
        echo "<input type='text' name='name id='name' value='{$type['name']}'>";
        echo "</div>";
        echo "<div class='text-center'>";
        // echo "<a class='edit' href='./back/edit_type&id={$type['id']}'>編輯</a>";
        echo "<input type='submit' value='修改'>";
        echo "<a class='dele' href='?do=dele_type.php=dele&id={$type['id']}'>刪除</a>";
        echo "</div>";
    }
    // 
    ?>

    <div>
        <label for="name">新增分類</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <input class="btn btn-primary" type="submit" value="送出">
    </div>
</form>