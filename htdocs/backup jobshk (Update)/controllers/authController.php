<?php
session_start();

require 'config/db.php';
require_once 'emailController.php';


$errors = array();
$username = "";
$email = "";

if (isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    if (empty($username)) {
        $errors['username'] = "Username required";
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

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1"; /*查询1行数据*/
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

        $sql = "INSERT INTO users (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssbss', $username, $email, $verified, $token, $password); /*該函式繫結了 SQL 的引數，且告訴資料庫引數的值。 “sss” 引數列處理其餘引數的資料型別。s 字元告訴資料庫該引數為字串。*/
        if($stmt->execute()){
            // login user
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;
            
            SendVerficationEmail($email, $token); //send email token

            // set flash message
            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: index.php');
            exit();
        } else {
            $errors['db_error'] = "Database error: failed to register";
        }

    
    }
}

//if user clicks on the login button
if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $errors['username'] = "Username required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }

    if (count($errors) ===0) {
    $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $username);
    $stmt->execute(); //run execute
    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); //獲取mysql一排的資料

    if (password_verify($password, $user['password'])) {
        // login success
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = $user['verified'];
        // set flash message
        $_SESSION['message'] = "You are now logged in!";
        $_SESSION['alert-class'] = "alert=success";
        header('location: index.php');
        exit();

    } else {
        $errors['login-fail'] = "Wrong Credentials";
    }
    }

    

}

//logout user
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: login.php');
    exit();
}

// verify user by token
function verifyUser($token)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update_query ="UPDATE users SET verified=1 WHERE token='$token'"; //如果token核對成功 mysql入面既verified會轉為1 之後成功去index.php

        if(mysqli_query($conn, $update_query)) {
        // login user in
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = 1;
        // set flash message
        $_SESSION['message'] = "Your email address was successfully verified";
        $_SESSION['alert-class'] = "alert=success";
        header('location: index.php');
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
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);   // $conn 係call db.php ($conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);)
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
        sendPasswordResetLink($email, $token); //send email token (call email_controller.php )
        header('location: password_message.php');
        exit(0);
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
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";
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
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: reset_password.php');
    exit(0);
}

