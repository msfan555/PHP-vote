<?php
include_once "../api/base.php";
$sql = "SELECT * FROM users WHERE id='{$_POST['id']}'";
$user = $pdo->query($sql)->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯會員資料</title>
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/admin.css">

    <style>
        .edit-box {
            width: 360px;
            padding: 2% 0 0;
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
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 13px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .edit-box .edit-acc input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #fcfcfc;
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
            display: flex;
            justify-content: space-evenly;
        }

        .edit-send {
            outline: 0;
            background: #5f386b;
            width: 35%;
            border: 0;
            padding: 12px;
            color: #f9c78b;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 5px 10px #ccc;
            border-radius: 5px;
        }

        .edit-send:hover {
            background: #71477c;
        }

        .res-btn {
            outline: 0;
            background: #8b6495;
            width: 35%;
            border: 0;
            padding: 12px;
            color: #FFFFFF;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 5px 10px #ccc;
            border-radius: 5px;
        }

        .res-btn:hover {
            /* background: #b48bbf; */
            color: #444;
        }
    </style>
</head>

<body>
    <div id="header">
        <?php include "../layout/admin_header.php"; ?>
    </div>


    <!-- 主要內容 -->
    <div id="container">

        <div class="edit-box">
            <h2>編輯會員資料</h2>
            <form action="save_member.php" method="post">
                <div class="edit-acc">
                    <label>帳號</label>
                    <input type="text" name="acc" value="<?= $user['acc']; ?>" readonly="readonly">
                </div>
                <div class="edit-data">
                    <label>密碼</label>
                    <input type="password" name="pw" value="" <?= $user['pw']; ?>>
                </div>
                <div class="edit-data">
                    <label>姓名</label>
                    <input type="text" name="name" value="<?= $user['name']; ?>">
                </div>
                <div class="edit-data">
                    <label>生日</label>
                    <input type="date" name="birthday" value="<?= $user['birthday']; ?>">
                </div>
                <div class="edit-data">
                    <label for="gender">性別</label>
                    <select name="gender" id="gender">
                        <option value="hide">--</option>
                        <option value="0" <?= ($user['gender'] == 0) ? 'selected' : ''; ?>>女性</option>
                        <option value="0" <?= ($user['gender'] == 1) ? 'selected' : ''; ?>>男性</option>
                        <!-- <option value="2"></option> -->
                    </select>
                </div>
                <div class="edit-data">
                    <label for="education">教育程度</label>
                    <select name="education" id="education">
                        <option value="hide">--</option>
                        <option value="1" <?= ($user['education'] == 1) ? 'selected' : ''; ?>>小學</option>
                        <option value="1" <?= ($user['education'] == 2) ? 'selected' : ''; ?>>中學</option>
                        <option value="1" <?= ($user['education'] == 3) ? 'selected' : ''; ?>>高中</option>
                        <option value="1" <?= ($user['education'] == 4) ? 'selected' : ''; ?>>大學</option>
                        <option value="1" <?= ($user['education'] == 5) ? 'selected' : ''; ?>>研究所</option>
                    </select>
                </div>
                <div class="edit-data">
                    <label for="email">email</label>
                    <input type="email" name="email" value="<?= $user['email']; ?>">
                </div>
                <div class="btns">
                    <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                    <input class="edit-send" type="submit" value="送出">
                    <input class="res-btn" type="reset" value="重置">
                </div>
            </form>
        </div>
    </div>

    <div>
        <?php include "../layout/footer.php"; ?>
    </div>
</body>

</html>