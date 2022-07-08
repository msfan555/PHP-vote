<!-- 分類管理 -->
<?php
include_once "../vote/api/base.php";

// $sql = "SELECT * FROM `types` WHERE name='{$_SESSION['name']}'";
// $type = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC); //導出資料

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
        .type-box {
            width: 400px;
            padding: 2% 0 0;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 1rem;
        }

        .type-name {
            outline: 0;
            background: #f2f2f2;
            width: 70%;
            border: 0;
            margin: 0 0 15px;
            padding: 10px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .edit {
            margin: 0.2rem 0.2rem;
            color: #444;
            text-decoration: none;
            padding: .15rem .3rem;
            margin: 0 .1rem;

        }

        .dele {
            color: #999;
        }

        .btn {
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
    </style>
</head>

<body>
    <div id="container">
        <div class="type-box">

            <form action="../vote/api/add_type.php" method="post">
                <h2>編輯分類</h2>
                <label for="">所有分類</label>
                <?php
                $types = all("types");
                foreach ($types as $type) {
                    echo "<div value='{$type['id']}'>";
                    echo "<input class='type-name' type='text' name='name id='name' value='{$type['name']}'>";
                    // echo "<a class='edit' href='./back/edit_type&id={$type['id']}'>編輯</a>";
                    echo "<input class='edit' type='submit' value='修改'>";
                    echo "<a class='dele' href='?do=dele_type.php=dele&id={$type['id']}'>刪除</a>";
                    echo "</div>";
                }
                // 
                ?>

                <div>
                    <label for="name">新增分類</label>
                    <input class="type-name" type="text" name="name" id="name">
                </div>
                <div>
                    <input type="hidden" name="id" value="<?= $type['id']; ?>">
                    <input class="btn send" type="submit" value="送出">
                </div>
            </form>
        </div>
    </div>

</body>

</html>