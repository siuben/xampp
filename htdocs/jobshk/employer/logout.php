<?php
session_start();
session_unset();

include('connection/db.php');

$query= mysqli_query ($conn,"select * from admin_login where admin_email='{$_SESSION['email']}' and admin_type='2'");
if ($query) {
    header('location:../index.php');
}else{
    header('location:admin_login.php');
}

?>