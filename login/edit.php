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
                    <td><input type="radio" name="gender" id="gender" value="0" <?= ($user['gender'] == 0) ? 'checked' : ''; ?>>女性</td>
                    <td><input type="radio" name="gender" id="gender" value="1" <?= ($user['gender'] == 1) ? 'checked' : ''; ?>>男性</td>
                </tr>
                <tr>
                    <td>地址</td>
                    <td><input type="text" name="addr" value="<?= $user['addr']; ?>"></td>
                </tr>
                <td><label for="education">教育程度</label></td>
                <td>
                    <select name="education" id="education">
                        <option value="1"<?= ($user['education'] == 1) ? 'selected' : ''; ?>>小學</option>
                        <option value="2"<?= ($user['education'] == 2) ? 'selected' : ''; ?>>中學</option>
                        <option value="3"<?= ($user['education'] == 3) ? 'selected' : ''; ?>>高中</option>
                        <option value="4"<?= ($user['education'] == 4) ? 'selected' : ''; ?>>大學</option>
                        <option value="5"<?= ($user['education'] == 5) ? 'selected' : ''; ?>>研究所</option>

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