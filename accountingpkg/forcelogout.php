<?php

include './MysqlConnection.php';
$email = $_GET["email"];
MysqlConnection::delete("UPDATE `user_master` SET `isLogin` = 'N' WHERE `username` = '$email'");
header("location:login.php");
