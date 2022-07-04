<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯會員資料</title>
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div id="header">
        <?php include "../layout/header.php"; ?>
        <?php include "../layout/mem_nav.php"; ?>
    </div>


    <!-- 主要內容 -->
    <div id="container">
        <h1>編輯會員</h1>
        <?php
        include_once "../api/base.php";
        $sql = "SELECT * FROM users WHERE id='{$_POST['id']}'";
        $user = $pdo->query($sql)->fetch();
        ?>
        <form action="save_member.php" method="post">
            <table>
                <tr>
                    <td>帳號</td>
                    <td><?= $user['acc']; ?></td>
                </tr>
                <tr>
                    <td>密碼</td>
                    <td><input type="password" name="pw" value="<?= $user['pw']; ?>"></td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td><input type="text" name="name" value="<?= $user['name']; ?>"></td>
                </tr>
                <tr>
                    <td>生日</td>
                    <td><input type="date" name="birthday" value="<?= $user['birthday']; ?>"></td>
                </tr>
                <tr>
                    <td>性別</td>
                    <td><input type="radio" name="gender" id="gender" value="<?= $user['gender']; ?>">女性</td>
                    <td><input type="radio" name="gender" id="gender" value="<?= $user['gender']; ?>">男性</td>
                </tr>
                <tr>
                    <td>地址</td>
                    <td><input type="text" name="addr" value="<?= $user['addr']; ?>"></td>
                </tr>
                <td>教育程度</td>
                <td>
                    <select name="education" id="education">
                        <option value="<?= $user['education']; ?>">小學</option>
                        <option value="<?= $user['education']; ?>">中學</option>
                        <option value="<?= $user['education']; ?>">高中</option>
                        <option value="<?= $user['education']; ?>">大學</option>
                        <option value="<?= $user['education']; ?>">研究所</option>
                    </select>
                </td>
                </tr>
            </table>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" value="<?= $user['email']; ?>"></td>
            </tr>
            <div>
                <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                <input type="submit" class="logbtn" value="送出">
            </div>
        </form>
    </div>
    <div>

        <?php include "../layout/footer.php"; ?>
    </div>
</body>

</html>