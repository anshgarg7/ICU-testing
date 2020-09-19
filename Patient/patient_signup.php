<?php include "../assets/fxn.php" ;?>


<html lang="en">
<head>
	<title>Sehat</title>
	<?php include "inner_links.php"; ?>


</head>
<body >

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('../../assets/images/bg-02.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="functionality/patient_registeract.php" method="post">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Number is required">
						<span class="label-input100">Mobile Number</span>
						<input class="input100" type="text" name="phone" placeholder="Phone...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid address is required">
						<span class="label-input100">Postal Address</span>
						<input class="input100" type="text" name="add1" placeholder="Postal addess...">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100">
 					<div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">Country</span></label><select class="form-control" name="country" id="Country_c" required>
                    <option selected disabled>Select Country</option>
                    <?php $country = getThis("SELECT `id`, `name` FROM `countries` ORDER BY `name` ASC") ?>
                    <?php foreach ($country as $k => $c) { ?>
                    <option value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
                   <?php } ?>
                  </select></div>
					</div>
					<div class="wrap-input100">
				<div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">State</span></label><select class="form-control" name="state" id="State_c" required>
	                    <option disabled selected>Select Country First</option>
		                  </select></div>
							</div>
						<div class="wrap-input100">
						<div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">City</span></label><select class="form-control" name="city" id="City_c" required>
	                    <option disabled selected>Select State First</option>
                 </select></div>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="uid" placeholder="Username...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="cpass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="sub">
								Sign Up
							</button>
						</div>

						<a href="patient_login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- footer part start-->
	 <footer class="footer-area">

	        <div class="copyright_part">
	            <div class="container">
	                <div class="row align-items-center">
	                    <p class="footer-text m-0 col-lg-8 col-md-18">
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Coded with <i class="ti-heart" aria-hidden="true"></i>  by Ansh & Tarun for a better internet</p>
	                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
	                        <a href="#"><i class="ti-facebook"></i></a>
	                        <a href="#"> <i class="ti-twitter"></i> </a>
	                        <a href="#"><i class="ti-instagram"></i></a>
	                        <a href="#"><i class="ti-linkedin"></i></a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </footer>

</body>
</html>


<script type="text/javascript">
$(document).ready(function(){
	$("#Country_c").change(function(){
		var CountryID = $("#Country_c").val();
		$.ajax({
			url: '../assets/worldData.php',
			method: 'post',
			data: 'Country='+CountryID
		}).done(function(countries){
			states = JSON.parse(countries);
			$('#State_c').empty();
			$('#State_c').append('<option disabled selected>Select State</option>');
			states.forEach(function(state){
				$('#State_c').append('<option value='+state.id+'>'+state.name+'</option>');
			})
			$('#State_c').append('<option value=0>My option is not listed</option>');
		})
	});
	$("#State_c").change(function(){
		var StateID = $("#State_c").val();
		$.ajax({
			url: '../assets/worldData.php',
			method: 'post',
			data: 'State='+StateID
		}).done(function(states){
			cities = JSON.parse(states);
			$('#City_c').empty();
			$('#City_c').append('<option disabled selected>Select City</option>');
			cities.forEach(function(city){
				$('#City_c').append('<option value='+city.id+'>'+city.name+'</option>');
			})
			$('#City_c').append('<option value=0>My option is not listed</option>');
		})
	});
  })
  </script>
