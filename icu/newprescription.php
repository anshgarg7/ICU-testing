<?php include "dash_common.php"; ?>

<!-- form area starts -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<?php
		$ipdID = e_d('d', $_GET["id"]); ?>
		<div class="row">





			<!-- prescription form starts here -->
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Prescription Form</h5>
						<form action="functionality/prescription_act.php" method="POST">
							<b>Symptoms</b>
							<div class="table-responsive">
								<table class="table " id="dynamic_field">
									<tr>
										<td><input type="text" name="symptoms[]" placeholder="Enter Patient Complaints" class="form-control name_list" /></td>
										<td><button type="button" name="add" id="add" class="mt-2 btn btn-primary">Add More</button></td>
									</tr>
								</table>
							</div>
							<b>Examination Findings</b>
							<div class="table-responsive">
								<table class="table " id="dynamic_field2">
									<tr>
										<td><input type="text" name="findings[]" placeholder="Enter Doctor Findings" class="form-control name_list" /></td>
										<td><button type="button" name="add2" id="add2" class="mt-2 btn btn-primary">Add More</button></td>
									</tr>
								</table>
							</div>

							<b>Diagnosis</b>
							<div class="table-responsive">
								<table class="table " id="dynamic_field3">
									<tr>
										<td><input type="text" name="diagnosis[]" placeholder="Enter Diagnosis" class="form-control name_list" /></td>
										<td><button type="button" name="add3" id="add3" class="mt-2 btn btn-primary">Add More</button></td>
									</tr>
								</table>
							</div>
							<div class="position-relative form-group"><label for="exampleAddress" class=""><b>Diet Advice</b></label><input name="diet" id="diet" placeholder="Diet Care" type="text" class="form-control"></div>
							<div class="position-relative form-group"><label for="exampleAddress2" class=""><b>Special Advice</b></label><input name="special" id="special" placeholder="Lab tests, Rest Period, Special Care etc." type="text" class="form-control"></div>
							<b>Test Advice</b>
							<div class="table-responsive">
								<table class="table " id="dynamic_field5">
									<tr>
										<td><input type="text" name="labtests[]" placeholder="Suggested Lab Test" class="form-control name_list" /></td>
										<td><button type="button" name="add5" id="add5" class="mt-2 btn btn-primary">Add More</button></td>
									</tr>
								</table>
							</div>
							<div class="table-responsive">
								<table class="table " id="dynamic_field1">
									<thead>
										<tr>
											<th>Medicine Name</th>
											<th>Instructions</th>
											<th>Dosage</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="text" name="med[]" placeholder="Medicine Name" class="form-control name_list" /></td>
											<td><input type="text" name="instruct[]" placeholder="Instructions" class="form-control name_list" /></td>
											<td><input type="number" name="dose[]" placeholder="Dosage" class="form-control name_list" /></td>
											<td><button type="button" name="add1" id="add1" class="mt-2 btn btn-primary">Add More</button></td>
										</tr>
									</tbody>
								</table>
							</div>

							<input type="hidden" name="ipdID" value="<?php echo $ipdID; ?>">
							<button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Submit</button>
						</form>
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





<script>
	$(document).ready(function() {
		var i = 1;
		$('#add1').click(function() {
			i++;
			$('#dynamic_field1').append('<tr id="row' + i + '"> <td><input type="text" name="med[]" placeholder="Medicine Name" class="form-control name_list" /></td><td><input type="text" name="instruct[]" placeholder="Instructions" class="form-control name_list" /></td><td><input type="number" name="dose[]" placeholder="Dosage" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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
		$('#add').click(function() {
			i++;
			$('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="symptoms[]" placeholder="Enter Patient Complaints" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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
			$('#dynamic_field2').append('<tr id="row' + i + '"><td><input type="text" name="findings[]" placeholder="Enter Doctor Findings" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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
		$('#add3').click(function() {
			i++;
			$('#dynamic_field3').append('<tr id="row' + i + '"><td><input type="text" name="diagnosis[]" placeholder="Enter Diagnosis" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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
		$('#add4').click(function() {
			i++;
			$('#dynamic_field4').append('<tr id="row' + i + '"><td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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
		$('#add5').click(function() {
			i++;
			$('#dynamic_field5').append('<tr id="row' + i + '"><td><input type="text" name="labtests[]" placeholder="Suggested Lab Test" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
		});

		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
	});
</script>