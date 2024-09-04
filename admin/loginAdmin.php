<?php

include('./action/serve.php');
session_start();

$errors = array();

if ($con) {
	if (isset($_POST['login'])) {
		// receive all input values from the register.php form
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$pword = mysqli_real_escape_string($con, $_POST['pword']);



		//by using array_push() corresponding errors in $errors() which is an array of errors.
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($pword)) {
			array_push($errors, "Password is required");
		}

		//check in database that the user exist.
		$query = "SELECT * FROM `users` WHERE email='$email'  AND pword= '$pword' ";

		$result = mysqli_query($con, $query);
		// var_dump($result);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['email'] = $email;
			// Redirect to user dashboard page
			header("Location: index.php");
		}
	}
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Start UP</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./assets/plugins/bootstrap/css/bootstrap.min.css">

	<style>
		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
		}

		.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}

		.nav-scroller .nav-link {
			padding-top: .75rem;
			padding-bottom: .75rem;
			font-size: .875rem;
		}

		.error {
			width: 92%;
			margin: 0px auto;
			padding: 10px;
			border: 1px solid #a94442;
			color: #a94442;
			background: #f2dede;
			border-radius: 5px;
			text-align: left;
		}

		.success {
			color: #3c763d;
			background: #dff0d8;
			border: 1px solid #3c763d;
			margin-bottom: 20px;
		}
	</style>
</head>

<body>


	<div class="row">
		<div class="col-md-6 offset-md-3 mt-5 shadow">
			<form method="post" action="" class="m-3 p-5">
				<h2 class="text-center pb-3">Register Here</h2>
				<!-- <?php include('errors.php');
						?> -->

				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>

				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Password</label>
					<input type="password" name="pword" class="form-control" id="exampleFormControlInput1">
				</div>
				<button type="submit" name="login" class="btn btn-primary btn-lg justify-items-center">Login</button>
			</form>
		</div>
	</div>

	</div>

	<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>