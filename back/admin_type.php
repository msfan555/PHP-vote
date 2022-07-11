<!-- 分類管理 -->
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

        .error {
            text-align: center;
            color: #bd3d3a;
            margin: 1rem;
            margin-top: 0;
        }

        .type-name {
            outline: 0;
            background: #f2f2f2;
            width: 100%;
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
            margin: 0.2rem 0.2rem 0.4rem 17.5rem;
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

            <h2>編輯分類</h2>
            <?php
            include_once "../vote/api/base.php";

            if (isset($_POST['name1[]'])) {
                foreach($_POST['id1[]'] as $idx => $id){
                    $editType = $_POST['name1'][$idx];
                    //$typeId = $_POST['id1'];
                
                    //資料庫撈出資料
                    $sql = "SELECT * FROM `types`  WHERE `name`='$editType'";
                    $chk = $pdo->query($sql)->fetchAll();
                    dd($chk);
                
                    $sql1 = "UPDATE `types` SET `name`='{$editType}' WHERE  `id`='{$id}'";
                
                    if ($chk) {
                        //判斷輸入的內容是否有重複
                        //這邊的isset會因為上面有先宣告了$error,所以一定是true
                        //而$chk如果有撈到值也表示有資料重複,所以這裏應該是直接給值就可以
                        //if (isset($error)) {
                        //    $error = "輸入的分類內容重複，請輸入其他分類";
                        //    echo "<h3 class=error>{$error}</h3>";
                        //}
                            $error = "輸入的分類內容重複，請輸入其他分類";
                            echo "<h3 class=error>{$error}</h3>";
                        
                    } else {
                        $pdo->exec($sql1);
                    }
                    exit(); 
                
                }
                }

            // $types = all("types");
            // if (isset($_POST['name'])) {

            //     $editName = $_POST['name'];
            //     $editId = $_POST['id'];

            //     echo $editName;
            //     // echo "<br>";
            //     echo $editId;
            //     exit();

            //     //資料庫撈出資料
            //     $sql = "SELECT * FROM `types`  WHERE `name`='$editName' && `id`='$editId'";
            //     $chk = $pdo->query($sql2)->fetchAll();
            //     dd($chk);
            //     exit();

            //     $error = '';

            //     if ($chk2) {
            //         //判斷輸入的內容是否有重複
            //         if (isset($error)) {
            //             $error = "輸入的分類內容重複，請輸入其他分類";
            //             echo "<h3 class=error>{$error}</h3>";
            //         }
            //     } else {
            //         $pdo->exec($sql1);
            //     }
            // }



            if (isset($_POST['name2'])) {

                $typeName = $_POST['name2'];
                // $typeId = $_POST['id'];
                echo $typeName;
                // exit ();

                //資料庫撈出資料
                $sql2 = "SELECT * FROM `types`  WHERE `name`='$typeName'";
                $chk2 = $pdo->query($sql2)->fetchAll();
                // echo $chk2;
                // dd($chk2);
                // exit();       

                $error = '';

                if ($chk2) { //判斷輸入的內容是否有重複，如果資料庫內有相同資料，chk2會大於0
                    if (isset($error)) {
                        $error = "輸入的分類內容重複，請輸入其他分類";
                        echo "<h3 class=error>{$error}</h3>";
                    }
                } else {
                    save('types', ['name' => $_POST['name2']]);
                }
            }

            ?>
            <form id="" method="post">

                <label for="name1">所有分類</label>
                <?php
                $types = all("types");
                foreach ($types as $type) {
                ?>
                    <div value=<?= $type['id']; ?>>
                        <input class='type-name' type='text' name="name1[]" id="name1" value="<?= $type['name']; ?>">
                        <input type='hidden' name='id1[]' value='<?= $type["id"]; ?>'>
                    </div>
                    <!-- <a class='dele' href='?do=dele_type.php=dele&id=<?php // $type["id"]; ?>'>刪除</a> -->
                    <?php
                }
                ?>
                <!-- <input class='edit' type='submit' value='修改'> -->
            </form>
            <form id="" method="post">

                <div>
                    <label for="name2">新增分類</label>
                    <input class="type-name" type="text" name="name2" id="name2">
                </div>
                <div>

                    <input class="btn send" type="submit" value="新增">
                </div>
            </form>
        </div>

    </div>

</body>

</html>