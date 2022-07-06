<?php

//取得主題id
$id = $_GET['id'];

//從資料表中撈出主題資料
$types = find('types', $id);

//從資料表中撈出該主題的所有選項資料
// $opts = all('options', ['subject_id' => $id]);
// dd($row);
// dd($opts);


?>

<label for="type">投票分類</label>
<input type="text" name="type" id="type" value="<?= $types['name']; ?>">