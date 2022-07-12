<?php
$subj = find("subjects", $_GET['id']);


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/basic.css">
<!-- <link rel="stylesheet" href="../css/admin.css"> -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>刪除投票</title>
    <link rel="stylesheet" href="../css/basic.css">
    <style>
        .confirm-box {
            width: 300px;
            padding: 2% 0 0;
            margin: 2rem auto;
        }

        h2 {
            text-align: center;
            color: #bd3d3a;
            margin: 1rem;
            /* margin-top: 0; */
        }

        label {
            color: gray;
            font-weight: bold;
        }

        .subject-data{
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 1rem auto 2rem;
            padding: 10px;
            box-sizing: border-box;
            font-size: 18px;
            text-align: center;
        }


        .btns {
            display: flex;
            justify-content: space-evenly;
        }

        .btn-send {
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

        .btn-send:hover {
            background: #71477c;
        }

        .btn-cancel {
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

        .btn-cancel:hover {
            /* background: #b48bbf; */
            color: #444;
        }
    </style>
</head>

<body>

    <div class="confirm-box">
        <h2>確定要刪除這份投票嗎？</h2>
        <label>主題</label>
        <div class="subject-data"><?= $subj['subject']; ?></div>
        <div class="btns">
            <button class="btns btn-send" onclick="location.href='./api/dele_vote.php?table=subjects&id=<?= $_GET['id']; ?>'">確定刪除</button>
            <button class="btns btn-cancel" onclick="location.href='admin.php'">取消</button>

        </div>
    </div>
</body>

</html>