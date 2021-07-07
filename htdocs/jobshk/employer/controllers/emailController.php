<?php
require_once 'vendor/autoload.php';
require_once 'config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function SendVerficationEmail($userEmail, $token)
{   
    global $mailer; //Global的作用是定义全局变量 
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
        <a href="http://localhost/WEEK19/index.php?token=' . $token . '"> 
            Verify your email address
        </a>
    </body>
    </html>';

    // Create a message (Send token去email)
    $message = (new Swift_Message('Verify your email address')) //email title
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html') //email body
;

    // Send the message
    $result = $mailer->send($message);
}

function sendPasswordResetLink($userEmail, $token) 
{
    global $mailer; //Global的作用是定义全局变量 
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
        <a href="http://localhost/WEEK19/index.php?password-token=' . $token . '"> 
            Reset your password
        </a>
    </body>
    </html>';

    // Create a message (Send token去email)
    $message = (new Swift_Message('Reset your password')) //email title
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html'); //email body

    // Send the message
    $result = $mailer->send($message);
}
