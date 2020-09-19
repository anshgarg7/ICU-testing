<?php
include "../assets/fxn.php";
if(isset($_SESSION["UID"])!=null){
	?>
	<script type="text/javascript">
		window.location='dashboard.php';
	</script>
	<?php
}
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sehat</title>
    <?php include "inner_links.php"; ?>

</head>
<body style="background-color:  white;">

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('../../assets/images/bg-02.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="functionality/patient_loginact.php" method="post">
					<span class="login100-form-title p-b-59">
						User Sign In
					</span>





					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>





					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign In
							</button>
						</div>

						<a href="patient_signup.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign Up
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

    <?php include "../assets/footer.php"; ?>

</body>
</html>
