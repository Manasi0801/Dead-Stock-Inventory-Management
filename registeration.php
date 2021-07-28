<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<title>REGISTERATION - D - STORE MANAGEMENT</title>
	<?php include 'signup/css/style.php' ?>
	<?php include 'signup/links/links.php' ?>
	
</head>

<body>

	<?php

	include 'signup/inc/dbconn.php';
	include 'signup/inc/constants.php';

	if (isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
		$image = mysqli_real_escape_string($con, $_POST['image']);

		$pass = password_hash($password, PASSWORD_BCRYPT);
		$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

		$emailquery = " select * from registeration where email='$email' ";
		$query = mysqli_query($con, $emailquery);

		$emailcount = mysqli_num_rows($query);

		if ($emailcount > 0) {
			echo "Email already exists";
		} else {
			if ($password == $cpassword) {

				$insertquery = "insert into registeration( username, email, mobile, password, cpassword ) values('$username','$email','$mobile','$pass','$cpass' )";
				$insertimage = "insert into pictures(image) values ('$image')";

				$iquery = mysqli_query($con, $insertquery);
				$iimage = mysqli_query($con, $insertimage);


				if ($iquery) {
	?>
					<script>
						alert("Inserted Successful");
					</script>
				<?php
				} else {

				?>
					<script>
						alert("Not Inserted");
					</script>
				<?php
				}
				if ($iimage) {
				?>
					<script>
						alert("Image Inserted Successful");
					</script>
				<?php
				} else {

				?>
					<script>
						alert("Image Not Inserted");
					</script>
				<?php
				}
			} else {
				?>
				<script>
					alert("Passwords are not matching");
				</script>
	<?php
			}
		}
	}

	?>

	<div class="card bg-light">
		<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">Create Account<h4>
					<p class="text-center">Get started with your free account</p>
					<p>
						<a href="" class="btn  btn-block btn-gmail"> <i class="fa fa-google"></i> Login via Gmail</a>

						<a href="" class="btn  btn-block btn-facebook"> <i class="fa fa-facebook"></i> Login via Facebook</a>
					</p>
					<p class="divider-text">
						<span class="bg-light">OR</span>
					</p>
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
							</div>
							<!--input-group-prepend// -->
							<input name="username" class="form-control" placeholder="Full Name" type="text" required>
						</div>
						<!--form group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
							</div>
							<!--input-group-prepend// -->
							<input name="email" class="form-control" placeholder="Email address" type="email" required>
						</div>
						<!--form group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
							</div>
							<!--input-group-prepend// -->
							<input name="mobile" class="form-control" placeholder="Phone Number" type="number" required>
						</div>
						<!--form group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
							</div>
							<!--input-group-prepend// -->
							<input class="form-control" placeholder="Create password" type="password" name="password" value="" required>
						</div>
						<!--form group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
							</div>
							<!--input-group-prepend// -->
							<input class="form-control" placeholder="Repeat password" type="password" name="cpassword" required>
						</div>
						<!--form group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-upload"></i> </span>
								<label>Select and Upload your Institution Id Card</label>
							</div>
							<!--input-group-prepend// -->
							<input class="form-control" placeholder="Upload your id" type="file" name="image" accept="image/*" required>
						</div>
						<!--form group// -->
						<div class=" form-group">
							<button type="submit" name="submit" class="btn btn-primary btn-block">Create Account </button>
						</div>
						<!--form group// -->
						<p class="text-center">Have an account? <a href="loginrembme.php">Log In</a>
						</p>
					</form>
		</article>
	</div><!-- card.// -->
	</div>

	</div>
	</div>

</body>
</html>
