

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();

require 'config/db.php';
//require_once 'emailController.php';


$errors = array();
$first_name = "";
$last_name = "";
$email = "";

if (isset($_POST['signup-btn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    if (empty($first_name)) {
        $errors['first_name'] = "first_name required";
    }
    if (empty($last_name)) {
        $errors['last_name'] = "last_name required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email address is invalid";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }

    if ($password !== $passwordConf) {
        $errors['password'] = "The two password do not match";
    }

    $emailQuery = "SELECT * FROM jobskeer WHERE email=? LIMIT 1"; /*查询1行数据*/
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email); /*該函式繫結了 SQL 的引數，且告訴資料庫引數的值。 “sss” 引數列處理其餘引數的資料型別。s 字元告訴資料庫該引數為字串。*/
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT); /*创建密码的散列*/
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $sql = "INSERT INTO jobskeer (first_name, last_name, email, verified, token, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssbss', $first_name, $last_name, $email, $verified, $token, $password); /*該函式繫結了 SQL 的引數，且告訴資料庫引數的值。 “sss” 引數列處理其餘引數的資料型別。s 字元告訴資料庫該引數為字串。*/
        if($stmt->execute()){
            // login user
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['verified'] = $verified;
            
         //   SendVerficationEmail($email, $token); //send email token

            // set flash message
           $_SESSION['message'] = "You are now logged in!";
          $_SESSION['alert-class'] = "alert-success";
          header('location: index1.php');



// Load Composer's autoloader
require 'email/vendor/autoload.php';

$to=$_POST['email'];
$from='siuben123@gmail.com';
$body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify email</title>
</head>
<body>
    <div class="wrapper"></div>
    <p>
        Thank you for signing up on website. Please click on the link below to verify your email.
    </p>
    <a href="http://localhost/jobshk/jobseeker/index1.php?token=' . $token . '"> 
        Verify your email address
    </a>
</body>
</html>';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'siuben123@gmail.com';                     // SMTP username
    $mail->Password   = 'y26350632';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($to, 'Mailer');
    $mail->addAddress($to, 'Jobseeker User');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
   //$mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<h1>Message has been sent</h1>';




} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
            exit();
        } 

    
    }
}

//if user clicks on the login button
if (isset($_POST['login-btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }

    if (count($errors) ===0) {
        $sql = "SELECT * FROM jobskeer WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute(); //run execute
        $result = $stmt->get_result();
        $user = $result->fetch_assoc(); //獲取mysql一排的資料
    
        if (password_verify($password, $user['password'])) {
            // login success
            $_SESSION['id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['verified'] = $user['verified'];
            if($user['verified']==1) {            
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                // set flash message
                $_SESSION['message'] = "You are now logged in!";
                $_SESSION['alert-class'] = "alert=success";
                header('location: ../index.php');
                exit();}else{
                    $errors['vertify'] = "You need to vertify your account.
                    Sign in to your email account and click on the
                    vertification link";
                }

    
        } else {
            $errors['login-fail'] = "Wrong Credentials";
        }
        }

    

}

//logout user
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: login.php');
    exit();
}

// verify user by token
function verifyUser($token)
{
    global $conn;
    $sql = "SELECT * FROM jobskeer WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update_query ="UPDATE jobskeer SET verified=1 WHERE token='$token'"; //如果token核對成功 mysql入面既verified會轉為1 之後成功去index.php

        if(mysqli_query($conn, $update_query)) {
        // login user in
        $_SESSION['id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = 1;
        // set flash message
        $_SESSION['message'] = "Your email address was successfully verified";
        $_SESSION['alert-class'] = "alert=success";
        header('location: ../index.php');
        exit();
        }
    } else {
        echo 'User not found';
    }
}

// if user clicks on the forgot password button
if (isset($_POST['forgot-password'])) {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email address is invalid";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }

    if (count($errors) == 0) {
        $sql = "SELECT * FROM jobskeer WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);   // $conn 係call db.php ($conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);)
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
        
require 'email/vendor/autoload.php';

$to=$_POST['email'];
$from='siuben123@gmail.com';
$body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify email</title>
</head>
<body>
    <div class="wrapper"></div>
    <p>
        Hello there,

        Please click on the link below to reset your password.
    </p>
    <a href="http://localhost/jobshk/jobseeker/index1.php?password-token=' . $token . '"> 
        Reset your password
    </a>
</body>
</html>';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'siuben123@gmail.com';                     // SMTP username
    $mail->Password   = 'y26350632';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($to, 'Mailer');
    $mail->addAddress($to, 'Jobseeker User');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
   //$mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<h1>Message has been sent</h1>';




} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
            header('location: password_message.php');
            exit();
    }
}

//if user clicked on the reset password button
if (isset($_POST['reset-password-btn'])) {
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    
    if (empty($password) || empty($passwordConf)) {
        $errors['password'] = "Password required";
    }

    if ($password !== $passwordConf) {
        $errors['password'] = "The two password do not match";
    }

    $password = password_hash($password, PASSWORD_DEFAULT); //更改
    $email = $_SESSION['email'];

    if (count($errors) == 0) {
        $sql = "UPDATE jobskeer SET password='$password' WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location: login.php');
            exit(0);
        }
    }

}


function resetPassword($token) //對網頁token email "http://localhost/WEEK19/index.php?password-token=' . $token . '"> 同 mysql token係唔係一樣  
{
    global $conn;
    $sql = "SELECT * FROM jobskeer WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: reset_password.php');
    exit(0);
}

