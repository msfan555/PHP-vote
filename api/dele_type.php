<?php
include_once "base.php";

$table=$_GET['table'];
$id=$_GET['id'];
if($table=='types'){
    del($id,$name);
}
to("../admin.php");
?>