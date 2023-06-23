<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'HMS');

if (isset($_POST['submit'])) {
	$users_first_name 		= $_POST['users_first_name'];
	$users_last_name 		= $_POST['users_last_name'];
	$users_email 			= $_POST['users_email'];
	$users_password 		= $_POST['users_password'];
	$passwordagain          = $_POST['passwordagain'];
	$md5password 	= md5($users_password);

	$emptymsg1 = $emptymsg2 = $emptymsg3 = $emptymsg4 = $emptymsg5 = $pasmatchmsg = '';


	if (empty($users_first_name)) {
		$emptymsg1 = 'Write Firstname';
	}
	if (empty($users_last_name)) {
		$emptymsg2 = 'Write Lastname';
	}
	if (empty($users_email)) {
		$emptymsg3 = 'Write email';
	}
	if (empty($users_password)) {
		$emptymsg4 = 'Write password';
	}
	if (empty($passwordagain)) {
		$emptymsg5 = 'Write password Again';
	}

	if (!empty($users_first_name) && !empty($users_last_name) && !empty($users_email) && !empty($users_password) && !empty($passwordagain)) {
		if ($users_password !== $passwordagain) {
			$pasmatchmsg = 'Password does not match!';
		} else {
			$pasmatchmsg = '';
			$sql = "INSERT INTO admins(users_first_name, users_last_name, users_email, users_password) 
						VALUES('$users_first_name', '$users_last_name', '$users_email', '$md5password')";

			if ($conn->query($sql) == TRUE) {
				header('location:login');
				$_SESSION['signupmsg'] = 'Sign Up Complete. Please Log in now.';
			} else {
				echo 'Data not inserted';
			}
		}
	} else {
		$emptymsg = 'Fill up all fields';
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/register by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2023 04:12:53 GMT -->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Doccure - Register</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
						<img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
					</div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Register</h1>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Form -->
							<form action="register" method="post">
								<div class="mt-2 pb-2">
									<label for="firstname">First Name:</label>
									<input type="name" name="users_first_name" class="form-control" placeholder="Your First Name" value="<?php if (isset($_POST['submit'])) {
																																				echo $users_first_name;
																																			} ?>">
									<span class="text-danger"><?php if (isset($_POST['submit'])) {
																	echo $emptymsg1;
																} ?></span>
								</div>
								<div class="mt-2 pb-2">
									<label for="users_last_name">Last Name:</label>
									<input type="name" name="users_last_name" class="form-control" placeholder="Your Last Name" value="<?php if (isset($_POST['submit'])) {
																																			echo $users_last_name;
																																		} ?>">
									<span class="text-danger"><?php if (isset($_POST['submit'])) {
																	echo $emptymsg2;
																} ?></span>
								</div>
								<div class="mt-2 pb-2">
									<label for="email">Email:</label>
									<input type="email" name="users_email" class="form-control" placeholder="Enter your email" value="<?php if (isset($_POST['submit'])) {
																																			echo $users_email;
																																		} ?>">
									<span class="text-danger"><?php if (isset($_POST['submit'])) {
																	echo $emptymsg3;
																} ?></span>
								</div>
								<div class="mt-1 pb-2">
									<label for="password">Password:</label>
									<input type="password" name="users_password" class="form-control" placeholder="Enter New password">
									<span class="text-danger"><?php if (isset($_POST['submit'])) {
																	echo $emptymsg4;
																} ?></span>
								</div>
								<div class="mt-1 pb-2">
									<label for="password">Password Again:</label>
									<input type="password" name="passwordagain" class="form-control" placeholder="Enter password Again">
									<span class="text-danger"><?php if (isset($_POST['submit'])) {
																	echo $emptymsg5 . '' . $pasmatchmsg;
																} ?></span>
								</div>
								<div class="form-group mb-0">
									<button name="submit" class="btn btn-primary btn-block">Register</button>
								</div>
							</form>
							<!-- /Form -->

							<div class="login-or">
								<span class="or-line"></span>
								<span class="span-or">or</span>
							</div>

							<!-- Social Login -->
							<div class="social-login">
								<span>Register with</span>
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
							</div>
							<!-- /Social Login -->

							<div class="text-center dont-have">Already have an account? <a href="login">Login</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/register by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2023 04:12:53 GMT -->

</html>