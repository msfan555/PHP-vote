<!-- 資料庫存取 -->

<?php
include_once "base.php";

dd($_POST);

//接收表單傳來的投票主題內容
$subject_id = $_POST['subject_id'];
$new_subject = $_POST['subject'];

$subject = find('subjects', $subject_id);

$subject['subject'] = $new_subject;


save('subjects', $subject);

$opts = all("options", ['subject_id' => $subject_id]);

dd($opts);



foreach ($_POST['option']  as $key => $opt) {
    $exist = false;
    foreach ($opts as $op) {
        if ($op['id'] == $key) {
            $exist = true;
            break;
        }
    }
    if ($exist) {
        //更新選項
        $op['option'] = $opt;
        save("options", $op);
    } else {
        //新增選項
        $add_option = [
            'option' => $opt,
            'subject_id' => $subject_id
        ];
        save("options", $add_option);
    }
}


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

to('../admin.php');

// header("location:../admin.php");
// 新增資料的列表傳到back.php
?>