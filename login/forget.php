<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        .reset-box {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: gray;
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
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 35%;
            border: 0;
            padding: 12px;
            color: #FFFFFF;
            font-size: 18px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .back {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #C3D825;
            width: 35%;
            border: 0;
            padding: 12px;
            color: #FFFFFF;
            font-size: 18px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div>
        <div class="reset-box">
            <h2>更新密碼</h2>
            <?php
            if (isset($_GET['error'])) {
                echo "<h3 class='error'>{$_GET['error']}</h3>";
            }
            ?>
            <form action="./chk_acc.php" method="post">
                <div class="reset-data">
                    <label for="acc">請輸入您的帳號</label>
                    <input type="text" name="acc" id="acc">
                </div>
                <div class="reset-data">
                    <label for="email">請輸入您的email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="reset-data">
                    <label for="pw">請輸入新的密碼</label>
                    <input type="password" name="pw" id="pw">
                </div>
                <div class="btns">
                    <a class="send" href='chk_acc.php'>送出</a>
                    <a class="back" href='../index.php'>回首頁</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>