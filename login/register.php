<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <style>
        h1{
            text-align: center;
        }
        table{
            margin: auto;
        }
        .btns{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>會員註冊</h1>

    <form action="store_member.php" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id=""> </td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" id=""> </td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" id=""> </td>
            </tr>
            <tr>
                <td>生日</td>
                <td><input type="date" name="birthday" id=""> </td>
            </tr>
            <tr>
                <td>性別</td>
                <td><input type="radio" name="gender" id="gender" value="0">女性</td>
                <td><input type="radio" name="gender" id="gender" value="1">男性</td>
            </tr>
            <tr>
                <td>地址</td>
                <td><input type="text" name="addr" id=""> </td>
            </tr>
            <tr>
                <td>教育程度</td>
                <td><select name="education" id="education">
                    <option value="0">小學</option>
                    <option value="1">中學</option>
                    <option value="2">高中</option>
                    <option value="3">大學</option>
                    <option value="4">研究所</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" id=""> </td>
            </tr>
        </table>
        <div class="btns">
            <input type="submit" value="註冊">
            <input type="reset" value="清空">
        </div>
    </form>
    
</body>
</html>