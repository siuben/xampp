<?php
session_start();
include('connection/db.php');

$login = $_SESSION['email'];

$job_title=$_POST['job_title'];
$Description=$_POST['Description'];
//$country=$_POST['country'];     //add_create_job.php select name
//$state=$_POST['state'];
//$city=$_POST['city'];
$District=$_POST['District'];
$category=$_POST['category'];
$Keyword=$_POST['Keyword'];
$company=$_SESSION['company'];

$query = mysqli_query($conn, "insert into  all_jobs(customer_email,job_title,des,category,keyword,company_name,district)values('$login','$job_title','$Description','$category','$Keyword','$company','$District')");
//var_dump($query);
if($query) {
    echo "Data has been sussessfuly Inserted";
    header('Location: job_create.php');
}else{
    echo "Error! Please try again";
}

?>

