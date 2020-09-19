<?php include "dash_common.php"; ?>
<?php
// include "../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
	<script type="text/javascript">
		window.location = 'logout.php';
	</script>
<?php
}
$id = $_SESSION["UID"];
$name = e_d('d', $_SESSION["fullName"]);
$email = e_d('$d', $_SESSION["emailAddress"]);
$phone = e_d('d', $_SESSION["phoneNumber"]);
$departmentID = $_SESSION["departmentID"];
$qualificationID = $_SESSION["qualificationID"];
$hospitalID = $_SESSION["hospitalID"];

$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalID'");
$hospital = $hospital[0];
$queue = getThis("SELECT patients.*,patienttoken.`appointmentAt` AS appointmentAt,patienttoken.`token` AS ptoken FROM `patients`,`patienttoken` WHERE patienttoken.`enabled`='1' AND patienttoken.`doctorID`='$id' AND patienttoken.`patientID`=patients.`id` ORDER BY patienttoken.`appointmentAt` ASC");

$holds = getThis("SELECT patients.*,patienttoken.`appointmentAt` AS appointmentAt,patienttoken.`token` AS ptoken FROM `patients`,`patienttoken` WHERE patienttoken.`enabled`='3' AND patienttoken.`doctorID`='$id' AND patienttoken.`patientID`=patients.`id` ORDER BY patienttoken.`appointmentAt` ASC");

?>
<!doctype html>
<html lang="en">

<!-- form area starts -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">

					<div>Patient Queue
						<div class="page-title-subheading">List of Your Appointments
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xl-12">
				<div class="card mb-3 widget-content bg-midnight-bloom">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Total Patients in Queue</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span><?php echo sizeof($queue); ?></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xl-12">
				<div class="card mb-3 widget-content bg-midnight-bloom">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Total Patients On Hold</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span><?php echo sizeof($holds); ?></span></div>
						</div>
					</div>
				</div>
			</div>
			<?php if (isset($queue[0]) != null) { ?>
				<div class="col-md-6 col-xl-6">
					<div class="card mb-3 widget-content bg-grow-early">
						<div class="card-body">
							<h5 class="card-title" style="color:white;">Next Patient</h5>
							<div class="row">
								<div class="col-md-4 col-xl-4 col-lg-4">
									<h5 class="card-title"><?php echo e_d('d', $queue[0]['fullName']); ?></h5>
								</div>
								<div class="col-md-4 col-xl-4 col-lg-3">
									<?php $date = date('<b>d M</b> Y <b>h.i.s A</b>', strtotime($queue[0]['appointmentAt'])); ?>
									<h5 class="card-title"><?php echo $date; ?></h5>
								</div>
								<div class="col-md-3 col-xl-2 col-lg-3">
									<a class="btn btn-primary" id="<?php echo $queue[0]['id']; ?>" href="patientprescription.php?id=<?php echo e_d('e', $queue[0]['id']); ?>&t=<?php echo $queue[0]['ptoken']; ?>">Attend Patient</a>
								</div>
								<div class="col-md-4 col-xl-2 col-lg-3">
									<a class="btn btn-primary" id="<?php echo $queue[0]['id']; ?>" href="functionality/holdpatient.php?id=<?php echo e_d('e', $queue[0]['id']); ?>&t=<?php echo $queue[0]['ptoken']; ?>">Hold Patient</a>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>

					<!-- testing here -->
					<div class="main-card mb-3 card" style="overflow-x:scroll;">
						<div class="card-body">
							<h5 class="card-title">Patients On Hold</h5>
							<table class="mb-0 table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Patient Name</th>
										<th>Appointment Time</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sizeofqueue = sizeof($holds);
									for ($i = 0; $i < $sizeofqueue; $i++) {
										$UL = $holds[$i]; ?>
										<tr>
											<th style="width:2%;" scope="row">
												<?php echo $i + 1; ?>
											</th>
											<td style="width:28%;">
												<?php echo e_d('d', $UL['fullName']); ?>
												<hr style="margin:2px;">
												<?php echo e_d('d', $UL['phoneNumber']); ?>
											</td>
											<td style="width:15%;">
												<?php $date1 = date('<b>d M</b> Y <b>h.i.s A</b>', strtotime($UL['appointmentAt'])); ?>
												<?php echo $date1; ?>
											</td>
											<td>
												<a class="mb-2 mr-2 btn btn-primary" id="<?php echo $UL['id']; ?>" href="patientprescription.php?id=<?php echo e_d('e', $UL['id']); ?>&t=<?php echo $UL['ptoken']; ?>">Attend Patient</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- ends here -->


				</div>
				<!-- <div class="col-md-6">

				</div> -->

				<?php if (isset($queue[0]) != null) { ?>
				<div class="col-md-6">
					<div class="main-card mb-3 card" style="overflow-x:scroll;">
						<div class="card-body">
							<h5 class="card-title">Appointment Queue</h5>
							<table class="mb-0 table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Patient Name</th>
										<th>Appointment Time</th>
										<!-- <th>Action</th> -->
									</tr>
								</thead>
								<tbody>
									<?php
									$sizeofqueue = sizeof($queue);
									for ($i = 1; $i < $sizeofqueue; $i++) {
										$UL = $queue[$i]; ?>
										<tr>
											<th style="width:2%;" scope="row">
												<?php echo $i + 1; ?>
											</th>
											<td style="width:28%;">
												<?php echo e_d('d', $UL['fullName']); ?>
												<hr style="margin:2px;">
												<?php echo e_d('d', $UL['phoneNumber']); ?>
											</td>
											<td style="width:15%;">
												<?php $date1 = date('<b>d M</b> Y <b>h.i.s A</b>', strtotime($UL['appointmentAt'])); ?>
												<?php echo $date1; ?>
											</td>
											<!-- <td>
												<a class="mb-2 mr-2 btn btn-primary" id="<?php echo $UL['id']; ?>" href="patientprescription.php?id=<?php echo e_d('e', $UL['id']); ?>&t=<?php echo $UL['ptoken']; ?>">Attend Patient</a>
											</td> -->
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
</div>
</div>




</body>

</html>
