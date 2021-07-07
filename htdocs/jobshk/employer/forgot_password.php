<?php require_once 'controllers/employer_authController.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<title>Forgot Password</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4 offset-md-4 form-div login">
		  <form action="forgot_password.php" method="post">
			<h3 class="text-center">Recover your password</h3>
            <p>
                Please enter your email address you used to sign up on this site
                and we will assit you in recovering your password.
            </p>
			<?php if(count($errors) > 0): ?>
			<div class="alert alert-danger">
			<?php foreach($errors as $error): ?>
				<li><?php echo $error; ?></li>
			<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
			<div class="form-group">
				<input type="email" name="email" class="form-control form-control-lg">
			</div>
			
			<div class="form-group">
                <button type="submit" name="forgot-password" class="btn btn-primary btn-block btn-lg">Recover your password</button>
		  	</div>
		
		  </form>
		</div>
	</div>
</div>
</body>
</html>