<?php
$types = find("types", $_GET['id']);


?>

<div class="confirm" style="width: 500px;margin:2rem auto;border:1px solid #ccc;box-shadow:2px 2px 15px #999;padding:2rem">
    <h2 style="text-align:center;color:red">確定要刪除這份投票嗎？</h2>
    <div>分類</div>
    <div style="font-size:1.5rem;text-align:center"><?=$types['name'];?></div>
    <button onclick="location.href='./api/dele_type.php?table=types&id=<?=$_GET['id'];?>'">確定刪除</button>
    <button onclick="location.href='admin.php'">取消</button>
</div>