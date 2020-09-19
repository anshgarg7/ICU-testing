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
$token = $_SESSION['patienttoken'];
$patientID = e_d('d',$_SESSION["patientIDforDoctor"]);
$details = getThis("SELECT  `fullName`, `phoneNumber`, `emailAddress`,`previousMedication`, `previousDiseases` FROM `patients` WHERE `id` = '$patientID'");
$details = $details[0];
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
                          <div class="col-lg-12">
                                      <div class="main-card mb-10 card"   style="overflow-x:scroll;">
                                          <div class="card-body text-black "><h3 class="card-title">Personal Details</h3>

                                              <table class="mb-0 table table-striped" style='font-size:150%'>

                                                  <tbody>
                                                  <tr>

                                                      <td>Name</td>
                                                      <td><?php echo e_d('d',$details['fullName']); ?></td>
                                                  </tr>
                                                  <tr>

                                                      <td>Contact Number</td>
                                                      <td><?php echo e_d('d',$details['phoneNumber']); ?></td>
                                                  </tr>
                                                  <tr>

                                                      <td>Email Address</td>
                                                      <td><?php echo e_d('d',$details['emailAddress']); ?></td>
                                                  </tr>
                                                  <tr>

                                                      <td>Previous Diseases</td>
                                                      <td><?php
                                                      if($details['previousDiseases'] != NULL){
                                                      $diseases = e_d('d',$details['previousDiseases']);
                                                      $diseases = unserialize($diseases);
                                                      for($i=0;$i<sizeof($diseases);$i++)
                                                      {
                                                          echo $diseases[$i]."<br>";
                                                      }
                                                  }
                                                  else
                                                  {
                                                      echo "None";
                                                  }
                                                      ?></td>
                                                  </tr>
                                                  <tr>

                                                      <td>Previous Medication</td>
                                                      <td><?php
                                                      if($details['previousMedication'] != NULL){
                                                      $medicine = e_d('d',$details['previousMedication']);
                                                      $medicine = unserialize($medicine);

                                                      for($i=0;$i<sizeof($medicine);$i++)
                                                      {
                                                          echo $medicine[$i]."<br>";
                                                      }
                                                  }
                                                  else
                                                  {
                                                      echo "None";
                                                  }
                                                      ?></td>
                                                  </tr>
                                                  </tbody>
                                              </table>
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
