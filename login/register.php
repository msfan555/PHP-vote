<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <link rel="stylesheet" href="../css/basic.css">

    <style>
        .reg-box {
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


        .reg-box .reg-data input {
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
            display: flex;
            justify-content: space-evenly;
        }

        .reg-btn {
            outline: 0;
            background: #5f386b;
            width: 35%;
            border: 0;
            padding: 12px;
            color: #f9c78b;
            font-size: 16px;
            box-shadow: 0 5px 10px #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .reg-btn:hover {
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
    </style>
</head>

<body>
    <div id="header">
        <?php include "../layout/index_header.php"; ?>
    </div>
    <div id="container">
        <div class="reg-box">
            <h2>會員註冊</h2>

            <form action="store_member.php" method="post">

                <div class="reg-data">
                    <label for="acc">帳號</label>
                    <input type="text" name="acc">
                </div>
                <div class="reg-data">
                    <label for="acc">密碼</label>
                    <input type="password" name="pw">
                </div>
                <div class="reg-data">
                    <label for="name">姓名</label>
                    <input type="text" name="name">
                </div>
                <div class="reg-data">
                    <label for="birthday">生日</label>
                    <input type="date" name="birthday" id="birthady">
                </div>
                <div class="reg-data">
                    <label for="gender">性別</label>
                    <select name="gender" id="gender">
                        <option value="hide">--</option>
                        <option value="0">女性</option>
                        <option value="1">男性</option>
                        <!-- <option value="2"></option> -->
                    </select>
                </div>
                <div class="reg-data">
                    <label for="education">教育程度</label>
                    <select name="education" id="education">
                        <option value="hide">--</option>
                        <option value="0">小學</option>
                        <option value="1">中學</option>
                        <option value="2">高中</option>
                        <option value="3">大學</option>
                        <option value="4">研究所</option>
                    </select>
                </div>
                <div class="reg-data">
                    <label for="email">email</label>
                    <input type="email" name="email">
                </div>


                <div class="btns">
                    <input class="reg-btn" type="submit" value="註冊">
                    <input class="res-btn" type="reset" value="清空">
                </div>
            </form>

        </div>
    </div>

    <div>
        <?php include "../layout/footer.php"; ?>
    </div>

</body>

</html>