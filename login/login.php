<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/basic.css">
<!-- <link rel="stylesheet" href="../css/admin.css"> -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <link rel="stylesheet" href="../css/basic.css">

    <style>
        .login-box {
            width: 360px;
            padding: 2% 0 0;
            margin: 2rem auto;
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

        .login-box .user-box input {
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
            outline: 0;
            background: #5f386b;
            width: 100%;
            border: 0;
            padding: 12px;
            color: #f9c78b;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 5px 10px #ccc;
            margin: 1.2rem 0;
        }

        .btn:hover {
            background: #71477c;
        }
    </style>
</head>

<body>

    <div id="header">
        <?php include "../layout/login_header.php"; ?>
    </div>

    <div id="container">
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
    </div>

    <div>
        <?php include "../layout/footer.php"; ?>
    </div>

</body>

</html>