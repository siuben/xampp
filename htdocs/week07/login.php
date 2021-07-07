<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8" />
        <title>會員登入</title>
    </head>
    <body>
    <?php
    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
        header('Location: backend.php');
    else:
    ?>
    <form method="post" action="checkUser.php">
        <?php
        if (isset($_GET['msg'])){
            echo "<p class='error'>{$_GET['msg']}</p>";
        }
        ?>
    <div>帳號:<input type="text" name="username" autofocus></div>
    <div>密碼:<input type="password" name="password"></div>
    <button type="submit">登入<</button>
    </form>
    <?php endif;?>
    </body>
</html>