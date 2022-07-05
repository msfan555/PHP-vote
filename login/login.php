<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        .login-box {
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

        .login-box .user-box input {
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

        .login-link {
            text-align: center;
            margin: 0.6rem;
            display: flex;
            justify-content: space-around;
        }

        .loginA {
            text-decoration: none;
            color: gray;
            /* margin: .5rem; */

        }

        .btn {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 12px;
            color: #FFFFFF;
            font-size: 18px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>會員登入</h2>
        <!-- <h1 style="text-align:center">Log In</h1> -->
        <?php
        if (isset($_GET['error'])) {
            echo "<h3 class=error>{$_GET['error']}</h3>";
        }
        ?>
        <form action="chk_login.php" method="post">
            <div class="user-box">
                <label for="acc">帳號</label>
                <input type="text" name="acc">
            </div>
            <div class="user-box">
                <label for="acc">密碼</label>
                <input type="password" name="pw">
            </div>

            <div>
                <button class="btn">登入</button>
            </div>

            <div class="login-link">
                <a class="loginA" href="register.php">建立帳戶</a>
                <a class="loginA" href="forget.php">忘記密碼</a>
            </div>

        </form>
    </div>

</body>

</html>