<?php 
require_once 'controllers/authController.php'; 

//verify the user using token (call authController)
if (isset($_GET['token'])) {
	$token = $_GET['token'];
	verifyUser($token);
}

//verify the user using token (call authController) 對網頁token email "http://localhost/WEEK19/index.php?password-token=' . $token . '"> 最後去reset_password.ph
if (isset($_GET['password-token'])) {
	$passwordToken = $_GET['password-token'];
	resetPassword($passwordToken);
}

if (!isset($_SESSION['id'])) {
	header('location: login.php');
	exit();
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<title>Homepage</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4 offset-md-4 form-div login">

		<?php if(isset($_SESSION['message'])): ?>
		  <div class="alert <?php echo $_SESSION['alert-class']; ?>">
			  <?php 
			  echo $_SESSION['message']; 
			  unset($_SESSION['message']);
			  unset($_SESSION['alert-class']);
			  ?>
			 </div>
		<?php endif; ?> 
		  <h3>Welcome, <?php echo $_SESSION['last_name']; ?><?php echo $_SESSION['first_name']; ?></h3>

		  <a href="index1.php?logout=1" class="logout">logout</a>
		  <?php if(!$_SESSION['verified']): ?>	
		  <div class="alert alert-warning">
		  You need to vertify your account.
		  Please sign in to your email account and click on the
		  vertification link
		  </div>
		  <?php endif; ?>

		  <?php if($_SESSION['verified']): ?>	
		  <button class="btn btn-block btn-lg btn-primary">I am verified!呢到開始設計後台網頁</button>
		  <?php endif; ?>
		</div>
	</div>
</div>
</body>
</html>