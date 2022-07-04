<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        h1{
            text-align: center;
        }
        table{
            width: 400px;
            margin: auto;
        }
        table td{
            padding: 1rem;
        }
        .btns{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center">會員登入</h1>
    <?php
    if(isset($_GET['error'])){
        echo "<h2 style='color:red;text-align:center'>{$_GET['error']}</h2>";
    }
    
    ?>
    <form action="chk_login.php" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <td>
                    <input type="text" name="acc">
                </td>
            </tr>
            <tr>
                <td>密碼</td>
                <td>
                    <input type="password" name="pw">
                </td>
            </tr>
            <tr>
                <td><a href="register.php">尚未註冊</a></td>
                <td><a href="forget.php">忘記密碼</a></td>
            </tr>
        </table>
        <div class="btns">
            <input type="submit" value="登入">
            <input type="reset" value="重置">
        </div>
    </form>
    
</body>
</html>