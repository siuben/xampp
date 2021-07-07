<?php
//生成6位隨機驗證碼
function codestr(){
    $arr=array_merge(range('a','b'),range('A','B'),range('0','9'));
    shuffle($arr);
    $arr=array_flip($arr);
    $arr=array_rand($arr,6);
    $res='';
    foreach ($arr as $v){
        $res.=$v;
}
return $res;
}
?>



<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>登錄</title>
<style>
.error {color: #FF0000;}
.tip {text-align:center; padding-top:10%}
</style>
</head>
<body> 

<div class="tip">

<h2>郵箱驗證頁面</h2>

<form method="post" action="yanzhen.php"> 
    <span><?php echo $Email;?></span></br>  //此處的$Email為接收用戶的郵箱（這兒看自己需求，可以是數據庫查詢，也可以是手動輸入，只需要最後賦值給$Email即可）
    <span class="error"><?php include '1email.php';?></span>  //此處為導入email.php文件，自動向用戶發送驗證郵箱
    <br><br>
    <input type="text" name="YanEmail" placeholder="請輸入驗證嗎">  //此處為用戶輸入的驗證碼
    <input type="hidden" name="yanzhen" value="<?php echo $yanzhen;?>" >  //此處為系統向用戶發送的驗證碼（注意：這樣寫對系統不安全，按照自己需求更改吧），
    <input type="submit" name="submit" value="驗證">

</form>
</div>

</body>
</html>

/+?+++---