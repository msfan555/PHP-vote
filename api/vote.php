<?php
//記錄投票結果
include_once "base.php";

function  save1($table, $arg)
{
    // global $pdo;
    $pdo = pdo();

    $sql = '';
    if (isset($arg['id'])) {
        //update

        foreach ($arg as $key => $value) {

            if ($key != 'id') {

                $tmp[] = "`$key`='$value'";
            }
        }
        //建立更新的sql語法
        $sql .= "UPDATE $table SET " . implode(" , ", $tmp) . " WHERE `id`='{$arg['id']}'";
    } else {
        //insert
        $cols = implode("`,`", array_keys($arg));
        $values = implode("','", $arg);

        //建立新增的sql語法
        $sql = "INSERT INTO $table (`$cols`) VALUES('$values')";
    }

    echo $sql;
    // return $pdo->exec($sql);
}

// echo $subject;
// exit ();

if (isset($_POST['opt'])) {

    if (is_array($_POST['opt'])) {
        foreach ($_POST['opt'] as $key => $opt) {
            $option = find("options", $opt);
            $option['total']++;
            save("options", $option);
            if ($key == 0) {
                $subject = find("subjects", $option['subject_id']);
                $subject['total']++;
                save("subjects", $subject);
            }
            $log = [
                'user_id' => (isset($_SESSION['id'])) ? $_SESSION['id'] : 0,
                'subject_id' => $subject['id'],
                'option_id' => $option['id']
            ];
            save1("logs", $log);
        }
    } else {

        $option = find("options", $_POST['opt']);
        $option['total']++;
        save("options", $option);
        $subject = find("subjects", $option['subject_id']);
        $subject['total']++;
        save("subjects", $subject);
        $log = [
            'user_id' => (isset($_SESSION['id'])) ? $_SESSION['id'] : 0,
            'subject_id' => $subject['id'],
            'option_id' => $option['id']
        ];
        save1("logs", $log);
    }
}

to("../index.php?do=vote_result&id={$option['subject_id']}");
?>