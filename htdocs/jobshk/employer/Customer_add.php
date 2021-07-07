<?php
include('connection/db.php');
$email=$_POST['email'];
$username=$_POST['Username'];
$password=$_POST['password'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$admin_type=$_POST['admin_type'];

$query = mysqli_query($conn, "insert into admin_login(admin_email, admin_pass, admin_username, 
first_name, last_name, admin_type)values('$email','$password','$username','$first_name','$last_name','$admin_type')");
var_dump($query);
if($query) {
    echo "<div class='alert alert-success'>Data has been sussessfuly Inserted</div>";
}else{
    echo "<div class='alert alert-danger'>Error! Please try again</div>";
}
?>