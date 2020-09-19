<?php include "dash_common.php"; ?>
<!-- form area starts -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">

					<div>Register a New Doctor
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tab-content">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<h5 class="card-title">Doctor Registeration</h5>
							<form class="" action="functionality/doc_registeract.php" method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="position-relative form-group"><label for="exampleEmail11" class="">Full Name</label><input name="name" placeholder="Full Name" type="text" class="form-control"></div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group"><label for="examplePassword11" class="">Email</label><input name="email" placeholder="Email" type="email" class="form-control"></div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group"><label for="exampleEmail11" class="">Phone Number</label><input name="phone" placeholder="10 Digit Mobile Number" type="number" class="form-control"></div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group"><label for="examplePassword11" class="">Date Of Birth</label><input name="dob" placeholder="Dob" type="date" class="form-control"></div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group"><label for="exampleEmail11" class="">Highest Qualification</label><select name="qid" type="number" class="form-control">
												<option selected disabled>Select Qualification</option>
												<?php $qualifications = getThis("SELECT * FROM `qualifications` WHERE `enabled`=1"); ?>
												<?php foreach ($qualifications as $key => $q) { ?>
													<option value="<?php echo $q['id']; ?>"><?php echo $q['qualificationName']; ?></option>
												<?php } ?>
											</select></div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group"><label for="examplePassword11" class="">Department</label><select name="did" type="number" class="form-control">
												<option selected disabled>Select Department</option>
												<?php $departments = getThis("SELECT `id`, `departmentName` FROM `departments` WHERE `enabled`=1"); ?>
												<?php foreach ($departments as $key => $d) { ?>
													<option value="<?php echo $d['id']; ?>"><?php echo $d['departmentName']; ?></option>
												<?php } ?>
											</select></div>
									</div>
									<div class="col-md-4">
										<div class="position-relative form-group"><label for="exampleAddress" class="">Consultation Fee</label><input name="fee" placeholder="Consultation Fee in INR" type="number" class="form-control"></div>
									</div>
									<div class="col-md-4">
										<div class="position-relative form-group"><label for="exampleAddress" class="">Basic Pay</label><input name="bPay" placeholder="Basic Pay Per Month in INR" type="number" class="form-control"></div>
									</div>
									<div class="col-md-4">
										<div class="position-relative form-group"><label for="exampleAddress" class="">Allowances</label><input name="allowance" placeholder="Allowances Per Month in INR" type="number" class="form-control"></div>
									</div>
									<div class="col-md-12">
										<div class="position-relative form-group"><label for="exampleAddress" class="">Address Line 1</label><input name="add1" placeholder="House Number, Landmark" type="text" class="form-control"></div>
									</div>
									<div class="col-md-4">
										<div class="position-relative form-group"><label for="exampleCity" class="">Country</label><select class="form-control" name="country" id="Country_c" required>
												<option selected disabled>Select Country</option>
												<?php $country = getThis("SELECT `id`, `name` FROM `countries` ORDER BY `name` ASC") ?>
												<?php foreach ($country as $k => $c) { ?>
													<option value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
												<?php } ?>
											</select></div>
									</div>
									<div class="col-md-4">
										<div class="position-relative form-group"><label for="exampleState" class="">State</label><select class="form-control" name="state" id="State_c" required>
												<option disabled selected>Select Country First</option>
											</select></div>
									</div>
									<div class="col-md-4">
										<div class="position-relative form-group"><label for="exampleCity" class="">City</label><select class="form-control" name="city" id="City_c" required>
												<option disabled selected>Select State First</option>
											</select></div>
									</div>
									<div class="col-md-12">
										<button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>




</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
		$("#Country_c").change(function() {
			var CountryID = $("#Country_c").val();
			$.ajax({
				url: '../assets/worldData.php',
				method: 'post',
				data: 'Country=' + CountryID
			}).done(function(countries) {
				states = JSON.parse(countries);
				$('#State_c').empty();
				$('#State_c').append('<option disabled selected>Select State</option>');
				states.forEach(function(state) {
					$('#State_c').append('<option value=' + state.id + '>' + state.name + '</option>');
				})
				$('#State_c').append('<option value=0>My option is not listed</option>');
			})
		});
		$("#State_c").change(function() {
			var StateID = $("#State_c").val();
			$.ajax({
				url: '../assets/worldData.php',
				method: 'post',
				data: 'State=' + StateID
			}).done(function(states) {
				cities = JSON.parse(states);
				$('#City_c').empty();
				$('#City_c').append('<option disabled selected>Select City</option>');
				cities.forEach(function(city) {
					$('#City_c').append('<option value=' + city.id + '>' + city.name + '</option>');
				})
				$('#City_c').append('<option value=0>My option is not listed</option>');
			})
		});
	})
</script>
