<?php
include "../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
	?>
	<script type="text/javascript">
		window.location='logout.php';
	</script>
	<?php
}

// $patientID = $_SESSION['patientIDforDoctor'];
$prescriptid = $_GET['id'];
$prescriptid = e_d('d',$prescriptid);
$_SESSION["prescriptionID"] = $prescriptid;

// $prescription = getThis("SELECT `symptoms`, `dietAdvice`, `specialAdvice`, `medicinePrescribed`, `medicineDosage`, `medicineInstructions` FROM `prescription` WHERE `id` = '$prescriptid'");
$prescription = getThis("SELECT `symptoms`, `dietAdvice`, `specialAdvice`, `doctorFindings`, `doctorDiagnosis`, `patientVitals`, `labTestAdvice`, `medicinePrescribed`, `medicineDosage`, `medicineInstructions`,`days` FROM `prescription` WHERE `id` = '$prescriptid'");
$prescription = $prescription[0];


$id = $_SESSION["UID"];
$name = e_d('d',$_SESSION["fullName"]);
$email = e_d('d',$_SESSION["emailAddress"]);
$phone = e_d('d',$_SESSION["phoneNumber"]);
$departmentID = $_SESSION["departmentID"];
$qualificationID = $_SESSION["qualificationID"];
$hospitalID = $_SESSION["hospitalID"];

$pid = $_SESSION["patientIDforDoctor"];
$patientID = e_d('d',$_SESSION["patientIDforDoctor"]);
$details = getThis("SELECT  `fullName`, `phoneNumber`, `emailAddress`,`previousMedication`, `previousDiseases` FROM `patients` WHERE `id` = '$patientID'");
$details = $details[0];
// $previousprescriptions = getThis("SELECT `id`,`symptoms`,`medicinePrescribed`, `generatedAt`, `updatedAt` FROM `prescription` WHERE `patientID`='$patientID' AND `doctorID`='$id' ORDER BY `generatedAt` DESC");
$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalID'");
$hospital = $hospital[0];
?>
<!doctype html>
<html lang="en">
<?php include "patient_dash_common.php"; ?>
<!-- form area starts -->
<div class="app-main__outer">
                    <div class="app-main__inner">
                <div class="col-md-12">
                          <div class="main-card mb-3 card">
                              <div class="card-body"><h5 class="card-title">Prescription Form</h5>
                                  <form action="functionality/update_act.php" method="POST">
                                      <b>Patient Complaints</b>
                                      <div class="table-responsive">
                                        <table class="table " id="dynamic_field">
                                          <tr>
																						  <td><button type="button" name="add" id="add" class="mt-2 btn btn-primary btn-lg btn-block">Add More</button></td>
                                              <?php
                                                    $symptoms = e_d('d',$prescription['symptoms']);
                                                    $symptoms = unserialize($symptoms);
                                                    for($x=0;$x<sizeof($symptoms);$x++)
                                                    {
                                                        ?>
<tr id="row<?php echo $x+1; ?>"><td><input type="text" name="symptoms[]" value="<?php echo $symptoms[$x]; ?>" class="form-control name_list" /></td>
	<td><button type="button" name="remove" id="<?php echo $x+1; ?>" class="btn btn-danger btn_remove">X</button></td></tr>
                                                            <?php
                                                    }
                                              ?>

                                          </tr>
                                        </table>
                                      </div>


																			<b>Doctor Finding</b>
                                      <div class="table-responsive">
                                        <table class="table " id="dynamic_field2">
                                          <tr>
																						  <td><button type="button" name="add" id="add2" class="mt-2 btn btn-primary btn-lg btn-block">Add More</button></td>
                                              <?php
                                                    $findings = e_d('d',$prescription['doctorFindings']);
                                                    $findings = unserialize($findings);
                                                    for($z=0;$z<sizeof($findings);$z++)
                                                    {
                                                        ?>
<tr id="rowrm2<?php echo $z+1; ?>"><td><input type="text" name="findings[]" value="<?php echo $findings[$z]; ?>" class="form-control name_list" /></td>
	<td><button type="button" name="remove" id="rm2<?php echo $z+1; ?>" class="btn btn-danger btn_remove2">X</button></td></tr>
                                                            <?php
                                                    }
                                              ?>

                                          </tr>
                                        </table>
                                      </div>

																			<b>Pateint Vitals</b>
                                      <div class="table-responsive">
                                        <table class="table " id="dynamic_field3">
                                          <tr>
																						  <td><button type="button" name="add" id="add3" class="mt-2 btn btn-primary btn-lg btn-block">Add More</button></td>
                                              <?php
                                                    $vitals = e_d('d',$prescription['patientVitals']);
                                                    $vitals = unserialize($vitals);
                                                    for($a=0;$a<sizeof($vitals);$a++)
                                                    {
                                                        ?>
<tr id="rowrm3<?php echo $a+1; ?>"><td><input type="text" name="vitals[]" value="<?php echo $vitals[$a]; ?>" class="form-control name_list" /></td>
	<td><button type="button" name="remove" id="rm3<?php echo $a+1; ?>" class="btn btn-danger btn_remove3">X</button></td></tr>
                                                            <?php
                                                    }
                                              ?>

                                          </tr>
                                        </table>
                                      </div>

																			<!-- doctorDiagnosis -->

																			<b>Doctor Diagnosis</b>
                                      <div class="table-responsive">
                                        <table class="table " id="dynamic_field4">
                                          <tr>
																						  <td><button type="button" name="add" id="add4" class="mt-2 btn btn-primary btn-lg btn-block">Add More</button></td>
                                              <?php
                                                    $diagnosis = e_d('d',$prescription['doctorDiagnosis']);
                                                    $diagnosis = unserialize($diagnosis);
                                                    for($b=0;$b<sizeof($diagnosis);$b++)
                                                    {
                                                        ?>
<tr id="rowrm4<?php echo $b+1; ?>"><td><input type="text" name="diagnosis[]" value="<?php echo $diagnosis[$b]; ?>" class="form-control name_list" /></td>
	<td><button type="button" name="remove" id="rm4<?php echo $b+1; ?>" class="btn btn-danger btn_remove4">X</button></td></tr>
                                                            <?php
                                                    }
                                              ?>

                                          </tr>
                                        </table>
                                      </div>

                                      <div class="position-relative form-group"><label for="exampleAddress" class=""><b>Diet Advice</b></label><input name="diet" id="diet" value="<?php echo e_d('d',$prescription['dietAdvice']) ?>" type="text" class="form-control"></div>
                                      <div class="position-relative form-group"><label for="exampleAddress2" class=""><b>Special Advice</b></label><input name="special" id="special" value="<?php echo e_d('d',$prescription['specialAdvice']) ?>" type="text" class="form-control"></div>
																			<div class="position-relative form-group"><label for="exampleAddress2" class=""><b>Follow Up Days</b></label><input name="days" id="days" value="<?php echo $prescription['days']; ?>" type="text" class="form-control"></div>

																			<div class="table-responsive">


																				<!-- labTestAdvice -->
																				<b>Lab Test Advice</b>
	                                      <div class="table-responsive">
	                                        <table class="table " id="dynamic_field5">
	                                          <tr>
																							  <td><button type="button" name="add" id="add5" class="mt-2 btn btn-primary btn-lg btn-block">Add More</button></td>
	                                              <?php
	                                                    $labtests = e_d('d',$prescription['labTestAdvice']);
	                                                    $labtests = unserialize($labtests);
	                                                    for($c=0;$c<sizeof($labtests);$c++)
	                                                    {
	                                                        ?>
	<tr id="rowrm5<?php echo $c+1; ?>"><td><input type="text" name="labtests[]" value="<?php echo $labtests[$c]; ?>" class="form-control name_list" /></td>
		<td><button type="button" name="remove" id="rm5<?php echo $c+1; ?>" class="btn btn-danger btn_remove5">X</button></td></tr>
	                                                            <?php
	                                                    }
	                                              ?>

	                                          </tr>
	                                        </table>
	                                      </div>


																				<table class="table " id="dynamic_field1">
                                          <thead>
                                            <tr>
                                              <th>Medicine Name</th>
                                              <th>Instructions</th>
                                              <th>Dosage</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <!-- `medicinePrescribed`, `medicineDosage`, `medicineInstructions` -->
                                            <tr>
																							<td><button type="button" name="add1" id="add1" class="mt-2 btn btn-primary btn-lg btn-block">Add More</button></td>
                                            <?php
                                            $medicine = e_d('d',$prescription['medicinePrescribed']);
                                            $medicine = unserialize($medicine);
                                            $dosage = e_d('d',$prescription['medicineDosage']);
                                            $dosage = unserialize($dosage);
                                            $instruction = e_d('d',$prescription['medicineInstructions']);
                                            $instruction = unserialize($instruction);
                                            for($y = 0;$y<sizeof($medicine);$y++){                                        ?>
<tr id="rowrm1<?php echo $y+1; ?>"> <td><input type="text" name="med[]" value= "<?php echo $medicine[$y]; ?>" class="form-control name_list" /></td>
	<td><input type="text" name="instruct[]" value= "<?php echo $instruction[$y]; ?>" class="form-control name_list" /></td>
	<td><input type="number" name="dose[]" value= "<?php echo $dosage[$y]; ?>" class="form-control name_list" />
	</td><td><button type="button" name="remove1" id="rm1<?php echo $y+1; ?>" class="btn btn-danger btn_remove1">X</button></td></tr>
                                          <?php
                                            }
                                            ?>
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





</body>
</html>





<script>
$(document).ready(function(){
	var i=<?php echo $y ?>;
	$('#add1').click(function(){
		i++;
		$('#dynamic_field1').append('<tr id="rowrm1'+i+'"> <td><input type="text" name="med[]" placeholder="Medicine Name" class="form-control name_list" /></td><td><input type="text" name="instruct[]" placeholder="Instructions" class="form-control name_list" /></td><td><input type="number" name="dose[]" placeholder="Dosage" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm1'+i+'" class="btn btn-danger btn_remove1">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove1', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>

<script>
$(document).ready(function(){
    var i=<?php echo $x ?>;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="symptoms[]" placeholder="Enter major symptoms" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>



<script>
$(document).ready(function(){
    var i=<?php echo $z ?>;
	$('#add2').click(function(){
		i++;
		$('#dynamic_field2').append('<tr id="rowrm2'+i+'"><td><input type="text" name="findings[]" placeholder="Enter major symptoms" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm2'+i+'" class="btn btn-danger btn_remove2">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove2', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>

<script>
$(document).ready(function(){
    var i=<?php echo $a ?>;
	$('#add3').click(function(){
		i++;
		$('#dynamic_field3').append('<tr id="rowrm3'+i+'"><td><input type="text" name="vitals[]" placeholder="Enter Patient Vitals" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm3'+i+'" class="btn btn-danger btn_remove3">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove3', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>


<script>
$(document).ready(function(){
    var i=<?php echo $b ?>;
	$('#add4').click(function(){
		i++;
		$('#dynamic_field4').append('<tr id="rowrm4'+i+'"><td><input type="text" name="diagnosis[]" placeholder="Enter Patient diagnosis" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm4'+i+'" class="btn btn-danger btn_remove4">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove4', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>



<script>
$(document).ready(function(){
    var i=<?php echo $c ?>;
	$('#add5').click(function(){
		i++;
		$('#dynamic_field5').append('<tr id="rowrm5'+i+'"><td><input type="text" name="labtests[]" placeholder="Enter Lab Test Advices" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm5'+i+'" class="btn btn-danger btn_remove5">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove5', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>
