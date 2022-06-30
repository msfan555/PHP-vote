<!-- 載入到back.php的container就不用再處理header footer -->
<!-- 頁面 或 資料庫讀出資料 -->
<form action="../vote/api/add_vote.php" method="post">
    <div>
        <label for="subject">投票主題</label>
        <input type="text" name="subject" id="subject">
        <!-- label的for對應input的id 所以都要設成subject -->
        <input type="button" value="新增選項" onclick="addOpt()">
    </div>
    <div id="selector">
        <input type="radio" name="multiple" value="0" checked>
        <label>單選</label>
        <input type="radio" name="multiple" value="1">
        <label>複選</label>
    </div>
    <div id="options">
        <label>選項</label><input type="text" name="option[]">
        <!-- 同一個name但是有多筆資料的時候，option+[]使其變成陣列 -->
    </div>
    <input type="submit" value="新增">

</form>

<script>
    function addOpt(){
        let opt=`<div><label>選項</label><input type="text" name="option[]">`;
        let opts=document.getElementById('options').innerHTML;
        opts=opts+opt;
        document.getElementById('options').innerHTML=opts;
    }
</script>