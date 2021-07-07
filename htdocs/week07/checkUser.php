<?php
session_start();
$db_user = "abc";
$db_password = "1234";

if(isset($_POST['username']) && isset($_POST['password']))
{
    if($_POST['username'] == $db_user && $_POST['password'] == $db_password)
    {
        $_SESSION['is_login'] = true;

        header('Location: backend.php');
    }
    else
    {
        $_SESSION['is_login'] = false;

        header('Location: login.php?msg=登入失敗,請確認帳號密碼');
    }
    }
    else
    {
        header('Location: login.php?msg=請正確登入');
    }
?>