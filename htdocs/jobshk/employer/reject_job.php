<?php
  include('connection/db.php');
  $id=$_GET['id'];
  $query=mysqli_query($conn,"delete from job_apply where id='$id'");
  echo "<script>
        window.setTimeout(function() {
            window.location.href= 'apply_jobs.php';
        },0); 
        </script>";
?>