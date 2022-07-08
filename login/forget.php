<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘記密碼</title>
    <link rel="stylesheet" href="../css/basic.css">

    <style>
        .reset-box {
            width: 360px;
            padding: 4% 0 0;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #444;
            margin: 2.2rem;
        }

        .error {
            text-align: center;
            color: #bd3d3a;
            margin: 1rem;
            margin-top: 0;
        }

        label {
            color: gray;
            font-weight: bold;
        }

        .reset-box .reset-data input {
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

        .btns {
            display: flex;
            justify-content: space-evenly;
        }

        .send {
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
            text-decoration: none;
            text-align: center;
        }

        .send:hover {
            background: #71477c;
        }

        .back {
            outline: 0;
            background: #295970;
            width: 35%;
            border: 0;
            padding: 12px;
            color: #FFFFFF;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 5px 10px #ccc;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }

        .back:hover {
            background: #3b6b81;
            color: #444;
        }
    </style>
</head>

<body>
    <div id="header">
        <?php include "../layout/login_header.php"; ?>
    </div>

    <div id="container">
        <div class="reset-box">
            <h2>忘記密碼</h2>
            <?php
            if (isset($_GET['error'])) {
                echo "<h3 class='error'>{$_GET['error']}</h3>";
            }
            ?>
            <form action="chk_acc.php" method="post">
                <div class="reset-data">
                    <label for="acc">請輸入您的帳號</label>
                    <input type="text" name="acc">
                </div>
                <div class="reset-data">
                    <label for="email">請輸入您的email</label>
                    <input type="email" name="email">
                </div>
                <div class="reset-data">
                    <label for="pw">請輸入新的密碼</label>
                    <input type="password" name="pw">
                </div>
                <div class="btns">
                    <a class="send" href='chk_acc.php'>送出</a>
                    <a class="back" href='../index.php'>回首頁</a>
                </div>
            </form>
        </div>
    </div>

    <div>
        <?php include "../layout/footer.php"; ?>
    </div>

</body>

</html>