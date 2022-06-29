<?php
session_start();
date_default_timezone_set('Asia/Taipei');
function pdo(){
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    return new PDO($dsn,'root','');
}



/**
 * $table - 資料表名稱 字串型式
 * $arg 參數型態
 *      1. 陣列 - 撈出符合陣列key = value 條件的單筆資料
 *      2. 字串 - 必須是資料表的id，數字型態，且資料表有id這個欄位
 */

function find($table,$arg){
    $pdo=pdo();
    
    $sql="SELECT * FROM $table WHERE ";
        if(is_array($arg)){
    
            foreach($arg as $key => $value){
    
                $tmp[]="`$key`='$value'";
    
            }
    
            $sql.=implode(" AND " ,$tmp);
    
        }else{
    
            $sql.=" `id`='$arg'";
    
        }
    
        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }


/**
 * $table - 資料表名稱 字串型式
 * $arg 參數型態
 *      1. 陣列 - 刪除符合陣列key = value 條件的所有資料
 *      2. 字串 - 必須是資料表的id，數字型態，且資料表有id這個欄位
 */

function del($table,$arg){
    $pdo=pdo();
    
    $sql="DELETE FROM $table WHERE ";
        if(is_array($arg)){
    
            foreach($arg as $key => $value){
    
                $tmp[]="`$key`='$value'";
    
            }
    
            $sql.=implode(" AND " ,$tmp);
    
        }else{
    
            $sql.=" `id`='$arg'";
    
        }
    
        return $pdo->exec($sql);
    }


/**
 * $table - 資料表名稱 字串型式
 * $math - 聚合函式名稱，必須有，支援以下聚合函式：
 *         count、max、min、avg、sum
 * $col - 要進行計算的欄位 字串型式
 * ...$arg - 參數型態
 *           1. 沒有參數，針對資料表全部資料進行計算
 *           2. 陣列 - 計算符合陣列key = value 條件的全部資料
 */

function math($table,$math,$col,...$arg){
    $pdo=pdo();
    
    $sql="SELECT $math(`$col`) FROM $table ";
    
}

/**
 * $url - 要導向的檔案路徑及檔名
 */

function  to($url){

    header("location:".$url);

}


/**
 * $sql - SQL語句字串，取出符合SQL語句的全部資料
 */

function  q($sql){
    $pdo=pdo();
    
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}


/**
 * $table - 資料表名稱 字串型式
 * $arg - 陣列型式
 *        1. 如果陣列中有key值為id，則執行更新(update)的功能
 *        2. 如果陣列中沒有key值為id，則執行新增(insert)的功能
 */

function  save($table,$arg){
    $pdo=pdo();
    $sql='';
    if(isset($arg['id'])){
        //update

        foreach($arg as $key => $value){

            if($key!='id'){

                $tmp[]="`$key`='$value'";
            }

        }
        //建立更新的sql語法
        $sql.="UPDATE $table SET ".implode(" , " ,$tmp)." WHERE `id`='{$arg['id']}'";

    }else{
        //insert
        $cols=implode("`,`",array_keys($arg));
        $values=implode("','",$arg);

        //建立新增的sql語法
        $sql="INSERT INTO $table (`$cols`) VALUES('$values')";

    }
    
    return $pdo->exec($sql);

}

?>

