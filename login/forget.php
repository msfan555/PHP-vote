<div>
    <h2>更新密碼</h2>
    <?php
    if(isset($_GET['error'])){
        echo "<h2 style='color:red;text-align:center'>{$_GET['error']}</h2>";
    }
    ?>
    <form action="./chk_acc.php" method="post">
    
        <label style="color: #a6c0fe; font-size: 20px; font-weight: 900;">請輸入您的帳號</label>
        <input type="text" name="acc"><br>
        <label style="color: #a6c0fe; font-size: 20px; font-weight: 900;">請輸入您的email</label>
        <input type="email" name="email"><br>
        <label style="color: #a6c0fe; font-size: 19px; font-weight: 900;">請輸入新的密碼</label>
        <input type="password" name="pw"><br>
        <br>
        <!-- <input type="submit" value="檢查"> -->
        <div>
            <button class="but" onclick="location.href='./chk_acc.php'">送出</button>
        </div>
        
        <div>
        <button type="button" onclick="location.href='login.php'">回首頁</button>
        </div>
    </form>
</div>