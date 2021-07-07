<?php require_once 'all_function.php'; ?>
<?php
session_start();
error_reporting(0);
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

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JobsHK</title>
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
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">JobsHK</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto" >


            <?php
            
            if( $_SESSION['email']==true){ ?>

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
