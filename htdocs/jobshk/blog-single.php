<?php
session_start();
require_once 'controllers/authController.php';
if(isset($_SESSION['email'])==true){
  include('connection/db.php');
  $header=mysqli_query($conn,"select * from jobskeer where email='{$_SESSION['email']}'");
  while ($row=mysqli_fetch_array($header)){
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $dob=$row['dob'];
    $mobile_number=$row['mobile_number'];
    $email=$row['email'];
    $resume=$row['resume'];
    
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Jobshk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="jobseeker/style.css">

  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">JobsHK</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">

	          <!--  <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> 
	          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li> -->
            <?php
            
            if(isset($_SESSION['email'])==true){ ?>

            <li class="nav-item <?php if($page=='home'){echo 'active';} ?>"><a href="index.php" class="nav-link">Home</a></li> 
            	         <li class="nav-item <?php if($page=='about'){echo 'active';} ?>"><a href="my_profile.php" class="nav-link">My Profile</a></li>
            <div class="dropdown">
           <a class="nav-link"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php if (empty($first_name)){echo $_SESSION['email'];}else {echo $last_name;} {echo $first_name;}?>
  </button></a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>  
           <!--    <li class="nav-item cta mr-md-2">
              <div class="dropdown">
              <a href="jobseeker/login.php" class="nav-link"><?php if (empty($first_name)){echo $_SESSION['email'];}else {echo $last_name;} {echo $first_name;}?></a>
              <ul class="dropdown-menu">
              <li><a href="my_profile.php">My Profile</a></li>
              <li><a href="logout.php">logout</a></li>
              </ul>
              </div>
              </li> -->
              <?php
            }else { ?>
            <li class="nav-item <?php if($page=='home'){echo 'active';} ?>"><a href="index.php" class="nav-link">Home</a></li> 
	          <li class="nav-item cta mr-md-2"><a href="jobseeker/login.php" class="nav-link">Login</a></li>
	          <li class="nav-item cta mr-md-2"><a href="jobseeker/signup.php" class="nav-link">Sign Up</a></li>
            <li class="nav-item mr-md-2 btn btn-outline-primary"><a href="employer/login.php" class="nav-link">For Employers</a></li>
            <?php
            }
            ?>


	        </ul>
	      </div>
	    </div>
      
	  </nav>
    <!-- END nav -->
    
    <?php
include('connection/db.php');
$id=$_GET['id'];

$query=mysqli_query($conn, "select * from all_jobs where job_id='$id'");
while ($row=mysqli_fetch_array($query)) {
    $title=$row['job_title'];
    $des=$row['des'];
    $country=$row['country'];
    $state=$row['state'];
    $city=$row['city'];
    $id_job=$row['job_id'];
    $company_name=$row['company_name'];
    $district=$row['district'];
    $Date_publish=$row['Date_publish'];
}

if(isset($_SESSION['email'])==true){ $query1=mysqli_query($conn,"select * from jobskeer where email='{$_SESSION['email']}'");
while($row=mysqli_fetch_array($query1)){
  $first_name=$row['first_name'];
  $last_name=$row['last_name'];
  $total_experience=$row['total_experience'];
  $latest_job=$row['latest_job'];
  $latest_employer=$row['latest_employer'];
  $job_from=$row['job_from'];
  $present=$row['present'];
  $category=$row['category'];
  $education=$row['education'];
  $expected_salary=$row['expected_salary'];
  $dob=$row['dob'];
  $mobile_number=$row['mobile_number'];
  $resume=$row['resume'];}
}
?>

<div style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Applying Job</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Applying Job</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
          
            <h2 class="mb-3"><td><?php echo $title;?></td></h2>
            <h5><?php echo $company_name; ?></h5>
            <h5><?php echo $district; ?> District, Hong Kong</h5>
            <br>
            <h1>Job Description</h1>
            <div name="Description" rows="20" cols="100" style="color:black; border:1px gray solid;"><?php echo $des; ?></div>
            <br>
            <?php
            if(isset($_SESSION['email'])==true){ ?>
            <form action="apply_job.php" method="post" id="JobPortal" enctype="multipart/form-data" style="border: 1px solid gray">
            <div style="padding: 2%;">
            <input type="hidden" name="job_seeker" value="<?php echo $_SESSION['email'];?> " id="job_seeker">
            <input type="hidden" name="id_job" value="<?php echo $id_job;?> " id="id_job">
                <div class="row">
                     <div class="col-sm-6">
                      <label for="">Enter Your First Name</label>
                      <input type="text" class="form-control" name="first_name" value="<?php if(!empty($first_name)) echo $first_name; ?>" placeholder="First Name..">
                    </div>
                    <div class="col-sm-6">
                     <label for="">Enter Your Last Name</label>
                     <input type="text" class="form-control" name="last_name" value="<?php if(!empty($last_name)) echo $last_name; ?>" placeholder="Last Name..">
                    </div>
                 </div>
                 <br>
                     <div class="row">
                         <div class="col-sm-6">
                         <label for="">Enter DOB</label>
                        <input type="date" class="form-control" name="dob" value="<?php if(!empty($dob)) echo $dob; ?>" placeholder="First Name..">
                     </div>
                     <div class="col-sm-6">
            
                     <label for="">Enter your contact number</label>
                        <input type="number" class="form-control" name="number" id="number" value="<?php if(!empty($mobile_number)) echo $mobile_number; ?>" placeholder="Contact number..">
                    </div>
                    </div>
                <br>

                <div class="row">
                         <div class="col-sm-6">
                         <label for="">Enter your Expected Salary</label>
                        <input type="expected_salary" class="form-control" name="expected_salary" id="expected_salary" value="<?php if(!empty($expected_salary)) echo $expected_salary; ?>" placeholder="expected_salary..">
                     </div>
                     <div class="col-sm-6">
                <label for="">Email</label>
                    <input type="text" class="form-control"  disabled value="<?php echo $_SESSION['email'];?> ">
                    </div>
                    </div>
                <br>
  <div class="row">
    <?php 
    if(!empty($resume)){ ?> 
    <div class="col-sm-6">
    <label for="">Choose Resume</label>
    <br>
    <label for="fileinp">
    <span id="text" class="form-control"><?php  echo $resume; ?></span>
    <div style="background-color:Gainsboro; color:black; width:60px; border:3px gray solid;">change</div>
    <input type="file" class="form-control" name="file"  id="fileinp" value="<?php if(!empty($resume)) echo $resume; ?>" placeholder="Enter Your dob" class="form-group">
    
</label>
  </div>
  <?php
     }else{ ?>
    <div class="col-sm-6">
    <label for="">Choose Resume</label>

        <input type="file" class="form-control" name="file" id="resume" value="<?php if(!empty($resume)) echo $resume; ?>" placeholder="Enter Your dob" class="form-group">
    </div>
    <?php
            }
            ?>
      </div>
                <br>

                <div class="row"> 
                <input type="submit" name="submit" value="Apply Now" placeholder="Apply Now" class="btn btn-primary btn-block">
            </div>
            

  
   </div>
            <br>
            </form>
            <?php
            }else { ?>
            
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-8 form-div login" >
		  <form action="" method="post">
			<h3 class="text-center">Login and Apply</h3>

			<?php if(count($errors) > 0): ?>
			<div class="alert alert-danger">
			<?php foreach($errors as $error): ?>
				<li><?php echo $error; ?></li>
			<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
			<div class="form-group">
				<label for="username">Email</label>
				<input type="text" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control form-control-lg">
			</div>
			<div class="form-group">
				<button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Login</button>
		  	</div>
			<P class="text-center">Not yet a mamber?<a href="jobseeker/signup.php">Sign Up</a></p>
			<div style="font-size: 0.8em; text-align: center;"><a href="jobseeker/forgot_password.php">Forgot your Password?</a></div>
		  </form>
		</div>
	</div>
</div>

                   <?php
            }
            ?>
  <br>
  <br>
  <br>      
  <br>
  <br>
  <br>
  <br>
  <br>      
  <br>
  <br>
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 <!--  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


  <script>
    function showMe(box) {

var chboxs = document.getElementsByName("c1");
var vis = "none";
for (var i = 0; i < chboxs.length; i++) {
  if (chboxs[i].checked) {
    vis = "block";
    break;
  }
}
document.getElementById(box).style.display = vis;


}

$("#fileinp").change(function () {
    $("#text").html($("#fileinp").val());
    
})


</script>


<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> 
 <!-- <script>CKEDITOR.replace('Description');</script> -->
 <!-- <script>    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline( 'Description' );</script> -->

  </body>
</html>