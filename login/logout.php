<?php
session_start();
unset($_SESSION['acc']); //清除session狀態
header("location:../index.php");
?>