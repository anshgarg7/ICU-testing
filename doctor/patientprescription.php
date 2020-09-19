<?php
include "../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
	<script type="text/javascript">
		window.location = 'logout.php';
	</script>
<?php
}
$id = $_SESSION["UID"];
$name = e_d('d', $_SESSION["fullName"]);
$email = e_d('d', $_SESSION["emailAddress"]);
$phone = e_d('d', $_SESSION["phoneNumber"]);
$departmentID = $_SESSION["departmentID"];
$qualificationID = $_SESSION["qualificationID"];
$hospitalID = $_SESSION["hospitalID"];
$_SESSION["patientIDforDoctor"] = $_GET['id'];
$_SESSION["patienttoken"] = $_GET['t'];
$pid = $_SESSION["patientIDforDoctor"];
$token = $_SESSION['patienttoken'];
$patientID = e_d('d', $_SESSION["patientIDforDoctor"]);
$details = getThis("SELECT  `fullName`, `phoneNumber`, `emailAddress`,`previousMedication`, `previousDiseases` FROM `patients` WHERE `id` = '$patientID'");
$details = $details[0];
$selectedData = getThis("SELECT `prescriptionView`, `laboratoryReportsView` FROM `patienttoken` WHERE `token`='$token'");
$selectedData = $selectedData[0];
$prescriptionSelected = e_d('d', $selectedData['prescriptionView']);
$prescriptionSelected = unserialize($prescriptionSelected);
$reportsSelected = e_d('d', $selectedData['laboratoryReportsView']);
$reportsSelected = unserialize($reportsSelected);
$previousprescriptions = getThis("SELECT `id`,`symptoms`,`medicinePrescribed`, `generatedAt`, `updatedAt` FROM `prescription` WHERE `patientID`='$patientID' AND `doctorID`='$id' ORDER BY `generatedAt` DESC");
$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalID'");
$hospital = $hospital[0];

?>
<!doctype html>
<html lang="en">
<?php include "patient_dash_common.php"; ?>
<!-- form area starts -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">

					<div>Patient <?php echo e_d('d', $details['fullName']); ?>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if ($prescriptionSelected != null) {
				if (sizeof($prescriptionSelected) > 0) { ?>
					<div class="col-md-12">
						<div class="main-card mb-3 card" style="overflow-x:scroll;">
							<div class="card-body">
								<h5 class="card-title">Previous Prescriptions By Myself</h5>
								<table class="mb-0 table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Symptoms</th>
											<th>Medication</th>
											<th>Prescription Date</th>
											<th>Update Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										for ($j = 0; $j < sizeof($prescriptionSelected); $j++) {
											$prescript = $prescriptionSelected[$j];
											$result = getThis("SELECT `id`,`symptoms`,`medicinePrescribed`, `generatedAt`, `updatedAt` FROM `prescription` WHERE `id`='$prescript' AND `patientID`='$patientID' AND `doctorID`='$id' ORDER BY `generatedAt` DESC");
											if (sizeof($result) > 0) {
												$result = $result[0];

										?>
												<tr>
													<th>#</th>
													<td>
														<?php
														$symptoms = e_d('d', $result['symptoms']);
														$symptoms = unserialize($symptoms);
														for ($i = 0; $i < sizeof($symptoms); $i++) {
															echo $symptoms[$i];
															echo "<br>";
														} ?>
													</td>
													<td>
														<?php
														$medicine = e_d('d', $result['medicinePrescribed']);
														$medicine = unserialize($medicine);
														for ($i = 0; $i < sizeof($medicine); $i++) {
															echo $medicine[$i];
															echo "<br>";
														} ?>
													</td>
													<?php $date = date('<b>d M</b> Y <b>h.i.s A</b>', strtotime($result['generatedAt'])); ?>
													<td><?php echo $date; ?></td>
													<td>
														<?php if ($result['updatedAt'] != null) {
															$date1 = date('<b>d M</b> Y <b>h.i.s A</b>', strtotime($result['updatedAt']));
															echo $date1;
														} else {
															echo "Not Updated";
														} ?>
													</td>
													<td>
														<a class="mb-2 mr-2 btn btn-primary" id="<?php echo $result['id']; ?>" href="viewprescription.php?id=<?php echo e_d('e', $result['id']); ?>">View</a>
														<a class="mb-2 mr-2 btn btn-primary" id="<?php echo $result['id']; ?>" href="prescription_update.php?id=<?php echo e_d('e', $result['id']); ?>">Update</a>
													</td>
												</tr>
										<?php }
										} ?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
			<?php }
			} ?>

			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Prescription Form</h5>
						<form action="functionality/prescription_act.php" method="POST">
							<b>Patient Complaints</b>
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
							<b>Vitals</b>
							<div class="table-responsive">
								<table class="table " id="dynamic_field4">
									<tr>
										<td><input type="text" name="vitals[]" placeholder="Enter Body Vitals" class="form-control name_list" /></td>
										<td><button type="button" name="add4" id="add4" class="mt-2 btn btn-primary">Add More</button></td>
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
							<div class="position-relative form-group"><label for="exampleAddress2" class=""><b>Special Advice</b></label><input name="special" id="special" placeholder="Rest Period, Special Care etc." type="text" class="form-control"></div>
							<b>Test Advice</b>
							<div class="table-responsive">
								<table class="table " id="dynamic_field5">
									<tr>
										<td><input type="text" name="labtests[]" placeholder="Suggested Lab Test" class="form-control name_list" /></td>
										<td><button type="button" name="add5" id="add5" class="mt-2 btn btn-primary">Add More</button></td>
									</tr>
								</table>
							</div>
							<div class="position-relative form-group"><label for="exampleAddress" class=""><b>Following Days</b></label><input name="days" id="days" placeholder="Number of days medicine needs to be followed" type="number" class="form-control"></div>
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
							<input type="hidden" name="hospitalID" value="<?php echo $hospitalID; ?>">
							<input type="hidden" name="doctorID" value="<?php echo $id; ?>">
							<input type="hidden" name="patientID" value="<?php echo $patientID; ?>">
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
