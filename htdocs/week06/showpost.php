<?php
$title = $_POST['title'];
$category = $_POST['category'];
$content = $_POST['content'];
$publish = $_POST['publish'];
$keyword = $_POST['keyword'];
?>

<h2>以下為傳過來資料</h2>
<p>標題: <?php echo $title;?></p>
<p>分類: <?php echo $category?></p>
<p>內容: <?php echo $content?></p>
<p>發佈狀況: <?php echo $publish?></p>
<p>關鍵字: <?php echo join(",",$keyword);?></p>