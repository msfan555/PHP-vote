<!-- 資料庫存取 -->

<?php
include_once "base.php";

$subject = $_POST['subject'];
$add_subject = [
    //只需要輸入當初設定時沒有預設值的欄位
    'subject' => $subject,
    'type_id' => 1,
    'start' => date("Y-m-d"),
    'end' => date("Y-m-d", strtotime("+10 days"))
];
save('subjects', $add_subject);
$id = find('subjects', ['subject' => $subject])['id'];

if (isset($_POST['option'])) {
    foreach ($_POST['option'] as $opt) {
        if ($opt != "") {
            $add_option = [
                'option' => $opt,
                'subject_id' => $id
            ];
            save("options", $add_option);
        }
    }
}

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

to('../admin.php');

// header("location:../admin.php");
// 新增資料的列表傳到back.php
?>