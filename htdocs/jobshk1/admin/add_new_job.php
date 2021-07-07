<?php
session_start();
include('connection/db.php');

$login = $_SESSION['email'];

$job_title=$_POST['job_title'];
$Description=$_POST['Description'];
$country=$_POST['country'];     //add_create_job.php select name
$state=$_POST['state'];
$city=$_POST['city'];
$category=$_POST['category'];
$Keyword=$_POST['Keyword'];

$query = mysqli_query($conn, "insert into  all_jobs(customer_email,job_title,des,country,state,city,category,keyword)values('$login','$job_title','$Description','$country','$state','$city','$category','$Keyword')");
//var_dump($query);
if($query) {
    echo "Data has been sussessfuly Inserted";
}else{
    echo "Error! Please try again";
}
?>