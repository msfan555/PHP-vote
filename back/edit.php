<!-- 分類管理 -->
<!-- 在admin.php已經引入base檔案，所以這裡不用再引入，
因為這裡是admin.php的container -->
<!-- 載入到back.php的container就不用再處理header footer -->
<!-- 頁面 或 資料庫讀出資料 -->

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯分類</title>
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/admin.css">

    <style>
        .edit-box {
            width: 360px;
            padding: 4% 0 0;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 1rem;
        }

        label {
            color: gray;
            font-weight: bold;
        }

        .edit-box .edit-data input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 13px;
            box-sizing: border-box;
            font-size: 14px;
        }

        select {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 13px;
            cursor: pointer;
        }

        .btns {
            outline: 0;
            background: #5f386b;
            width: 30%;
            border: 0;
            padding: 0.4rem 0.4rem;
            color: #f9c78b;
            font-size: 16px;
            cursor: pointer;
            font-weight: 400;
            margin: -0.5rem 0.5rem 0.4rem 15rem;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px #ccc;
        }

        #btn-opt {
            outline: 0;
            width: 30%;
            border: 0;
            padding: 0.4rem 0.4rem;
            font-size: 16px;
            cursor: pointer;
            font-weight: 350;
            margin: -0.5rem 0.5rem 0.4rem 15rem;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px #ccc;
            background: #295970;
            color: #ffffff;
        }

        #btn-opt:hover {
            background: #3b6b81;
        }

        .btn-send {
            margin: 0.5rem 0.5rem 0.4rem 15rem;
            font-weight: bold;
        }

        .btn-send:hover {
            background: #8e6997;
        }
    </style>
</head>

<body>

    <div id="container">
        <form action="../vote/api/edit_vote.php" method="post">
            <div class="edit-box">
                <h2>編輯投票</h2>
                <div>
                    <label for="types">選擇分類</label>
                    <select name="types" id="types">
                        <?php
                        $types = all("types");
                        foreach ($types as $type) {
                            $selected = ($subjs['type_id'] == $type['id']) ? 'selected' : '';
                            echo "<option value='{$type['id']}' $selected>";
                            echo $type['name'];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="edit-data">
                    <label for="multiple">單/複選</label>
                    <select name="multiple" id="multiple">
                        <option value="hide">--</option>
                        <option name="multiple" value="value=" 0 <?= ($subjs['multiple'] == 0) ? 'selected' : ''; ?>>單選</option>
                        <option name="multiple" value="value=" 1 <?= ($subjs['multiple'] == 1) ? 'selected' : ''; ?>>複選</option>
                    </select>
                </div>
                <div class="edit-data">
                    <label for="subject">投票主題</label>
                    <input type="text" name="subject" id="subject" value="<?= $subjs['subject']; ?>">
                    <!-- label的for對應input的id 所以都要設成subject -->
                    <input id="btn-opt" type="button" value="新增選項" onclick="addOpt()">
                    <input type="hidden" name="subject_id" value="<?= $subjs['id']; ?>">
                </div>
                <div class="edit-date" id="options">
                    <?php
                    foreach ($opts as $opt) {

                    ?>
                        <div class="edit-data">
                            <label>選項</label><input type="text" name="option[<?= $opt['id']; ?>]" value="<?= $opt['option']; ?>">
                            <!-- 同一個name但是有多筆資料的時候，option+[]使其變成陣列 -->
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <input class="btns btn-send" type="submit" value="修改">

        </form>

        <script>
            function addOpt() {
                let opt = `<div><label>選項</label><input type="text" name="option[]">`;
                let opts = document.getElementById('options').innerHTML;
                opts = opts + opt;
                document.getElementById('options').innerHTML = opts;
            }
        </script>
    </div>
    </div>
</body>

</html>