<?php
    session_start();
?>
<DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8" />
        <title>後台管理</title>
    </head>

<body>
    <?php
    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
        ?>
    <div class="result">
        <h2>你正在後台,登入成功</h2>
    <p>
        <a href='logout.php'>把我登出</a>
    </div>
    <?php
    else:
        header('Location: login.php');
    endif;
    ?>
</body>
</html>