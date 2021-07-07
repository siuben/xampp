<?php

//[*郵件發送邏輯處理過程*系統核心配置文件*]


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//調用PHPMailer組件，此處是你自己的目錄，需要改寫。
require 'email/vendor/autoload.php';

$mail = new PHPMailer(true);       // Passing `true` enables exceptions
try {
    //服務器配置
    $mail->CharSet ="UTF-8";                     //設定郵件編碼
    $mail->SMTPDebug = 0;                        // 調試模式輸出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = '	smtp.qq.com';            // SMTP服務器
    $mail->SMTPAuth = true;                      // 允許 SMTP 認證
    $mail->Username = '**********';              // SMTP 用戶名  即郵箱的用戶名
    $mail->Password = '****************';        // SMTP 密碼  部分郵箱是授權碼(例如163郵箱)
    $mail->SMTPSecure = 'ssl';                    // 允許 TLS 或者ssl協議
    $mail->Port = 465;                            // 服務器端口 25 或者465 具體要看郵箱服務器支持

    $mail->setFrom('*********qq.com', 'Mailer');  //發件人（以QQ郵箱為例）
    
    $mail->addAddress($Email, 'Joe');  // 收件人（$Email可以為變量傳值，也可為固定值）
    //$mail->addAddress('ellen@example.com');  // 可添加多個收件人
    $mail->addReplyTo('*********@qq.com', 'info'); //回復的時候回復給哪個郵箱 建議和發件人一致
    //$mail->addCC('cc@example.com');                    //抄送
    //$mail->addBCC('bcc@example.com');                    //密送

    //發送附件
    // $mail->addAttachment('../xy.zip');         // 添加附件
    // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 發送附件並且重命名
    
    $yanzhen = codestr();  //此處為調用隨機驗證碼函數（按照自己實際函數名改寫）

    //Content
    $mail->isHTML(true);                                  // 是否以HTML文檔格式發送  發送後客戶端可直接顯示對應HTML內容
    $mail->Subject = '******身份登錄驗證';
    $mail->Body    = '<h1>歡迎使用******</h1><h3>您的身份驗證碼是：<span>'.$yanzhen.'</span></h3>' . date('Y-m-d H:i:s');
    $mail->AltBody = '歡迎使用********,您的身份驗證碼是：'.$yanzhen . date('Y-m-d H:i:s');

    $mail->send();
    echo '驗證郵件發送成功，請注意查收！';
} catch (Exception $e) {
    echo '郵件發送失敗: ', $mail->ErrorInfo;
}


?>