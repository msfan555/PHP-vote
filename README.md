# 投票系統作業

## 使用者故事(user story)

### 共用
* 主畫面切割為上中下三塊
    * 上方為標題輪播或選單列
    * 中間為主要內容區
    * 下方為公司名稱及頁尾版權宣告或聯絡方式
* 選單列有以下列內容
    * 首頁按鈕
    * 登入按鈕
    * 投票列表按鈕
* 會員註冊時需提供以下資料，以供投票分析之用
    * 生日
    * 性別
    * 學歷
    * 住址

### 使用者端
* 進入首頁時，可以看到投票項目列表
* 可以選擇想要了解的項目進行點選
* 未登入的使用者只可以看到投票的結果
* 已登入的使用者可以看到投票結果及"我要投票"按鈕
* 按下我要投票時會顯示投票項目
* 選擇項目後，按送出，完成投票
* 完成投票後，跳至投票結果頁
* 投票結果有一顆按鈕可以返回首頁
* 可以選擇投票分類
* 可以排序投票
* 投票列表可以分頁
* 會員中心可以查看參與過的投票

### 管理者端
* 要透過登入才能進入管理者端
* 登入後可以看到所有的投票列表
* 有"新增投票"按鈕
* 點選新增投票後進入新增投票表單頁面
* 在新增頁面可以設定投票主題
* 選項可以動態增加
    * 在主題旁有一個"增加選項"的按鈕
    * 每按一次"增加選項"就會在下方增加一個項目
    * 可以刪除選項
* 完成設定後按下"完成新增"，即增加一個投票主題
* 可查看投票結果(含統計分析)
* 可以修改投票主題或選項
* 可以刪除投票

## 功能需求
* 註冊/登入系統
* 前/後台頁面切版
* 前端讀出功能(列表/註冊表單/會員中心)
* 新增投票
* 修改投票
* 刪除投票
* 投票結果的統計分析
* 投票的參與者資料分析

## 資料表設計
### 資料庫名稱:vote
* users
    |名稱|型態|預設值|A_I|備註|
    |--|--|--|--|--|
    |id|int(11)|--|true|序號|
    |acc|varchar(12)|--|--|帳號|
    |pw|varchar(16)|--|--|--|
    |name|varchar(12)|--|--|--|
    |birthday|date|--|--|--|
    |gender|tinyint(1)|--|--|--|
    |addr|varchar(64)|--|--|--|
    |education|varchar(32)|--|--|--|
    |reg_date|date|--|--|--|
* admins
    |名稱|型態|預設值|A_I|備註|
    |--|--|--|--|--|
    |id|int(11)|--|true|序號|
    |acc|varchar(12)|--|--|帳號|
    |pw|varchar(16)|--|--|--|
    |name|varchar(12)|--|--|--|
* subjects
    |名稱|型態|預設值|A_I|備註|
    |--|--|--|--|--|
    |id|int(11)|--|true|序號|
    |subject|varchar(128)|--|--|主題描述|
    |type_id|int(11)|--|--|--|
    |multiple|boolean(1)|--|--|單/複選|
    |multi_limit|tinyint(2)|1|--|單/複選項目數|
    |start|date|--|--|--|
    |end|date|--|--|--|
    |total|int(11)|--|--|--|
* options
    |名稱|型態|預設值|A_I|備註|
    |--|--|--|--|--|
    |id|int(11)|--|true|序號|
    |option|varchar(128)|--|--|選項描述|
    |subject_id|int(11)|--|--|--|
    |total|int(11)|--|--|--|

* log
    |名稱|型態|預設值|A_I|備註|
    |--|--|--|--|--|
    |id|int(11)|--|true|序號|
    |user_id|int(11)|--|--|投票者|
    |sujbect_id|int(11)|--|--|--|
    |option_id|int(11)|--|--|--|
    |vote_time|timestamp|--|--|--|

* types
    |名稱|型態|預設值|A_I|備註|
    |--|--|--|--|--|
    |id|int(11)|--|true|序號|
    |name|varchar(128)|--|--|分類名稱|



