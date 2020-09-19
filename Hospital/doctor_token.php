<?php include "dash_common.php" ?>
<!-- form area starts -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">

					<div><?php echo $name; ?>'s Dashboard
						<div class="page-title-subheading">Welcome to Your DashBoard!!
						</div>
					</div>
				</div>
			</div>
		</div>
		<form action="functionality/doctor_tokenact.php" method="post">
			<div class="wrap-input100">
				<div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">
							<h5>Department</h5>
						</span></label><select class="form-control" name="department" id="department_c" required>
						<option selected disabled>Select Doctor Department</option>
						<?php $department = getThis("SELECT `id`, `departmentName` FROM `departments` ORDER BY `departmentName` ASC") ?>
						<?php foreach ($department as $k => $c) { ?>
							<option value="<?php echo $c['id']; ?>"><?php echo $c['departmentName']; ?></option>
						<?php } ?>
					</select></div>
				<div class="wrap-input100">
					<div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">
								<h5>Doctors</h5>
							</span></label><select class="form-control" name="doctor" id="doctor_c" required>
							<option disabled selected>Select Department First</option>
						</select></div>
				</div>
				<button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Generate Attendance Token</button>
			</div>

		</form>
	</div>
</div>
</body>

</html>


<script type="text/javascript">
	$(document).ready(function() {
		$("#department_c").change(function() {
			var departmentID = $("#department_c").val();
			$.ajax({
				url: '../assets/worldData.php',
				method: 'post',
				data: 'department=' + departmentID
			}).done(function(departments) {
				doctors = JSON.parse(departments);
				$('#doctor_c').empty();
				$('#doctor_c').append('<option disabled selected>Select Doctor</option>');
				doctors.forEach(function(doctor) {
					$('#doctor_c').append('<option value=' + doctor.id + '>' + doctor.fullName + '</option>');
				})
				$('#doctor_c').append('<option value=0>My option is not listed</option>');
			})
		});
	})
</script>

<script>
	$(document).ready(function() {
		var i = 1;
		$('#add').click(function() {
			i++;
			$('#dynamic_field').append('<tr id="row' + i + '"><td><input type="time" name="start_slot[]" placeholder="Enter opening time of OPD" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
		});

		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
	});
</script>

<script>
	$(document).ready(function() {
		var i = 1;
		$('#add1').click(function() {
			i++;
			$('#dynamic_field1').append('<tr id="row' + i + '"><td><input type="time" name="end_slot[]" placeholder="Enter closing time of OPD" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
		});

		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
	});
</script>

<script>
	$(document).ready(function() {
		var i = 1;
		$('#add2').click(function() {
			i++;
			$('#dynamic_field2').append('<tr id="row' + i + '"><td><input type="text" name="visitingDays[]" placeholder="Enter one day at a time" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
		});

		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
	});
</script>
