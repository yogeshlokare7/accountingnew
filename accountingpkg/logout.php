<?php

session_start();
ob_start();
include './MysqlConnection.php';
$username = $_SESSION["user"]["email"];


MysqlConnection::delete("UPDATE `tbl_login_history` SET `logouttime` = '" . date("Y-m-d h:i:s") . "' WHERE `accountname` = '$username' AND logindate = '" . date("Y-m-d") . "'");
MysqlConnection::delete("UPDATE `user_master` SET `isLogin` = 'N' WHERE `username` = '$username'  ");

session_destroy();
header("location:login.php");
