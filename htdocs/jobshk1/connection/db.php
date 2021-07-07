<?php
$server ="sql311.epizy.com";
$username ="epiz_27755058";
$password ="jwC0hhJbK8tXb0";
$dbname ="epiz_27755058_job_portal";

$conn=mysqli_connect($server, $username,$password,$dbname);
if(!$conn){
    die("Connection Failed:".mysqli_connect_error());
}
?>