<?php
include_once "./api/base.php";

//登入者的身分
$userId = $_SESSION['id'];

$subject = find("subjects", $_GET['id']);

$opts = all("options", ['subject_id' => $_GET['id']]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票結果</title>
    <style>
        .vote-box {
            width: 360px;
            padding: 2% 0 0;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 1rem;
        }

        .vote-item {
            color: #444;
            font-weight: bold;
            margin: 1rem 1.5rem;
        }

        .vote-btns{
            display: flex;
            justify-content: end;
            margin: 1rem .5rem 1rem;
        }

        .vote-btn{
            outline: 0;
            border: 0;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 5px 10px #ccc;
            border-radius: 5px;
            margin: 0.7rem 0.5rem 0.4rem 1rem;
        }
        .voteSub{
            background-color: #5f386b;
            width: 20%;
            color: #f9c78b;
        }

        .voteSub:hover {
            background: #71477c;
        }

        .reset{
            background-color: #8b6495;
            width: 25%;
            color: #ffffff;
        }

        .reset:hover {
            /* background: #b48bbf; */
            color: #444;
        }
/* 
        .back{
            background-color: #5f386b;
            width: 25%;
        } */
    </style>
</head>

<body>

    <div class="vote-box">
        <h2><?= $subject['subject']; ?></h2>
        <form action="./api/vote.php" method="post">

            <?php
            foreach ($opts as $opt) {
            ?>
                <div class="vote-item">
                    <?php
                    if ($subject['multiple'] == 0) {
                    ?>
                        <input type="radio" name="opt" value="<?= $opt['id']; ?>">
                    <?php
                    } else {
                    ?>
                        <input type="checkbox" name="opt[]" value="<?= $opt['id']; ?>">
                    <?php
                    }
                    ?>
                    <?= $opt['option']; ?>
                </div>
            <?php
            }
            ?>
            <div class="vote-btns">
                <input class="vote-btn voteSub" type="submit" value="投票！">
                <input class="vote-btn reset" type="reset" value="重新選擇">
                <!-- <input class="vote-btn back" type="button" value="放棄投票" onclick="location.href='index.php'"> -->
            </div>
        </form>
    </div>
</body>

</html>