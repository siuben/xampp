<?php

require 'constants.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die('Database error' . $conn->connect_error);  /*die>必需。规定在退出脚本之前写入的消息或状态号。状态号不会被写入输出。*/
}
