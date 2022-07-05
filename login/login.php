<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        .login-box {
            /* width: 30px; */
            padding: 20% 5%;
            margin: auto;
        }

        .error{
            text-align: center;
            color: #bd3d3a;
            margin: 1rem;
            margin-top: 0;
        }

        .login-box .user-box input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .reg-link {
            text-align: left;
            margin: 0.6rem;
            padding: 0 0.5rem;
        }

        .reg-link{
            text-align: center;
            margin: 0.6rem;
            display: flex;
            justify-content: space-around;
        }

        .loginLink {
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
            padding: 15px;
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
        <!-- <h1 style="text-align:center">Log In</h1> -->
        <?php
        if (isset($_GET['error'])) {
            echo "<h3 class=error>{$_GET['error']}</h3>";
        }
        ?>
        <form action="../vote/login/chk_login.php" method="post">
            <div class="user-box">
                <input type="text" name="acc" placeholder="帳號">
            </div>
            <div class="user-box">
                <input type="password" name="pw" placeholder="密碼">
            </div>

            <div>
                <button class="btn">登入</button>
            </div>

            <div class="reg-link">
                <a class="loginLink" href="../vote/login/register.php">建立帳戶</a>
                <a class="loginLink" href="../vote/login/forget.php">忘記密碼</a>
            </div>

        </form>
    </div>

</body>

</html>