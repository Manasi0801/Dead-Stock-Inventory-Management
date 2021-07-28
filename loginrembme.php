<?php
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php include 'signup/css/style.php' ?>
    <?php include 'signup/links/links.php' ?>
</head>

<body>

    <?php

    include "dbconn.php";

    if (isset($_POST[`submit`])) {
        $email = $_POST[`email`];
        $password = $_POST[`password`];

        $emailquery = " select * from registeration where email='$email' and password = '$password'";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

	if ($emailcount > 0) {
		
				header('location:registeration.php');
			}

		else{
		echo "Password Incorrect";
		}
		
    }
    ?>

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your account</p>
            <p>
                <a href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn  btn-block btn-gmail"> <i class="fa fa-google"></i> Login via Gmail</a>
                <a href="https://www.facebook.com/" class="btn  btn-block btn-facebook"> <i class="fa fa-facebook"></i> Login via Facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <form action="<?php echo htmlentities($_SERVER[' PHP_SELF']); ?> method=" POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="UserName/Email" type="email" value="<?php  if(isset($_COOKIE['emailcookie'])) { echo $_COOKIE['emailcookie'];}  ?>">
                </div>
                <!--form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" value="<?php  if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE['passwordcookie'];}  ?>">
                </div>
                <!--form-group// -->


                <div class="form-group">
                    <input type="checkbox" name="rememberme"> Remember Me
                </div>
                <!--form-group// -->


                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Login </button>
                </div>
                <!--form-group// -->
                <p class="text-center">Not have an account? <a href="registeration.php">Sign Up </a> </p>
            </form>
        </article>
    </div> <!-- card.// -->

    </div>

</body>

</html>