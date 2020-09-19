<?php
include "../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
	?>
	<script type="text/javascript">
		window.location='logout.php';
	</script>
	<?php
}
$id = $_SESSION["UID"];
$name = e_d('d',$_SESSION["fullName"]);
$email = e_d('d',$_SESSION["emailAddress"]);
$phone = e_d('d',$_SESSION["phoneNumber"]);
$departmentID = $_SESSION["departmentID"];
$qualificationID = $_SESSION["qualificationID"];
$hospitalID = $_SESSION["hospitalID"];
$pid = $_SESSION["patientIDforDoctor"];
$patientID = e_d('d',$_SESSION["patientIDforDoctor"]);
$token = $_SESSION['patienttoken'];
$details = getThis("SELECT  `fullName`, `phoneNumber`, `emailAddress`,`previousMedication`, `previousDiseases` FROM `patients` WHERE `id` = '$patientID'");
$details = $details[0];
$selectedData = getThis("SELECT `prescriptionView`, `laboratoryReportsView` FROM `patienttoken` WHERE `token`='$token'");
$selectedData = $selectedData[0];
$prescriptionSelected = e_d('d',$selectedData['prescriptionView']);
$prescriptionSelected = unserialize($prescriptionSelected);
$reportsSelected = e_d('d',$selectedData['laboratoryReportsView']);
$reportsSelected = unserialize($reportsSelected);
$previousprescriptions = getThis("SELECT `id`,`symptoms`,`medicinePrescribed`, `generatedAt`, `updatedAt` FROM `prescription` WHERE `patientID`='$patientID' AND `doctorID`='$id' ORDER BY `generatedAt` DESC");
$allprescriptions = getThis("SELECT prescription.`id` AS prescriptionid,`symptoms`,`medicinePrescribed`, `generatedAt`, `updatedAt`,doctors.`fullName` AS doctorName FROM `prescription`,`doctors` WHERE `patientID`='$patientID' AND prescription.`doctorID`=doctors.`id` ORDER BY `generatedAt` DESC");
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

                                    <div>Patient <?php echo e_d('d',$details['fullName']); ?>
                                    </div>
                                </div>
                               </div>
                        </div>
                        <div class="row">
                          <?php if($reportsSelected !=null){
                          if(sizeof($reportsSelected)>0){ ?>
                            <div class="col-lg-12">
                                  <div class="main-card mb-3 card"   style="overflow-x:scroll;">
                                      <div class="card-body"><h5 class="card-title">Patient Reports</h5>
                                          <table class="mb-0 table table-striped">
                                              <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Test Name</th>
  												                        <th>Test Date & Time</th>
                                                  <th>Lab Name</th>
                                                  <th>Referred By</th>
                                                  <th>View</th>

                                              </tr>
                                              </thead>
                                              <tbody>
  																							<?php
                                                for ($j=0; $j < sizeof($reportsSelected); $j++) {
      																						$report = $reportsSelected[$j];
                                                  $result = getThis("SELECT `id`, `prescriptionID`, `laboratoryID`, `testName`, `reportLink`, `testTime` FROM `labreports` WHERE `patientID` = '$patientID' AND `id`='$report'");
      																						if(sizeof($result)>0){
      																						$result = $result[0];
                                                  ?>
                                              <tr>
                                                  <th style="width:2%;" scope="row">#</th>
                                                  <td style="width:10%;"><?php echo e_d('d',$result['testName']); ?></td>
																									<?php $date = date('<b>d M</b> Y <b>h.i.s A</b>',strtotime($result['testTime'])); ?>
                                                  <td style = "width:10%"><?php echo $date; ?></td>
                                                  <td style="width:10%;"><?php echo $result['laboratoryID']; ?></td>
                                                  <td style="width:10%;">
                                                      <?php $prescripId =  $result['prescriptionID'];
                                                          $doctor_name = 'Self';
                                                          if($prescripId != 0){
                                                          $doctorId = getThis("SELECT `doctorID` FROM `prescription` WHERE `id` = $prescripId");
                                                          $doctorId =  $doctorId[0]['doctorID'];
                                                          $temp_doctor = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = $doctorId");
                                                          $doctor_name = $temp_doctor[0]['fullName'];
                                                          $doctor_name = e_d('d',$doctor_name);
                                                          }
                                                          echo $doctor_name;
                                                      ?>
                                                  </td>
                                                  <td style="width:10%;">
                                                      <a href="report.php?rep=<?php echo e_d('e',$result['id']); ?>" >View Details</a>
                                                  </td>
                                              </tr>
                                            <?php }} ?>
                                              </tbody>
                                          </table>

                                      </div>
                                  </div>
                              </div>
											<?php }}else{ ?>
												<div class="col-md-12 col-xl-12">
														<div class="card mb-3 widget-content bg-grow-early">
															<div class="card-body"><h5 class="card-title" style="color:white;"></h5>
																					<h2>NO PRESCPTION PRESCRIBED YET</h2>
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
