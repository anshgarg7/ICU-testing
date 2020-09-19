<?php
include "dash_common.php";
if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $prescriptionId = '0';
    $patientId = getThis("SELECT `id` FROM `patients` WHERE `username` = '$username'");
    $patientId = $patientId[0]['id'];
    ?>
    <div class="app-main__outer">
                        <div class="app-main__inner">
                        <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Sample Record</h5>
                                            <form class="" action = "functionality/sampleAct.php" method = "post">
                                              <div class="col-md-12">
                                                  <div class="position-relative form-group"><label for="exampleEmail11" class="">Test Name</label><input name="testName" id="exampleEmail11" placeholder="Name of Test" type="text" class="form-control" required></div>
                                              </div>
                                                <!-- <div class="form-row">

                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Sample Name/Number</label><input name="sampleName" id="exampleEmail11" placeholder="Name/Number Of Sample" type="text" class="form-control" required></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="examplePassword11" class="">Sample Type</label><input name="sampleType" id="examplePassword11" placeholder="Type Of the Sample" type="text" class="form-control" required></div>
                                                    </div>
                                                </div>
                                                <div class="position-relative form-group"><label for="exampleAddress" class="">Remarks (if any)</label><input name="sampleRemarks" id="exampleAddress" placeholder="Remarks about the Sample" type="text" class="form-control"></div> -->
                                                <div class="table-responsive">
								<table class="table " id="dynamic_field">
                                <thead>
                                <th>Sample Name/Number</th>
                                <th>Sample Type</th>
                                <th>Remarks, If any</th>
                                <th>Add</th>
                                </thead>
									<tr>
										<td><input type="text" name="sampleName[]" placeholder="Enter The Sample Name/Number" class="form-control name_list" /></td>
										<td><input type="text" name="sampleType[]" placeholder="Enter The Sample Type" class="form-control name_list" /></td>
										<td><input type="text" name="sampleRemarks[]" placeholder="Sample Remarks (if any)" class="form-control name_list" /></td>

										<td><button type="button" name="add" id="add" class="mt-2 btn btn-success">Add More</button></td>
									</tr>
								</table>
							</div>
                                                <input type="hidden" value="self" name="typeoftest"></input>
                                               <input type="hidden" value="<?php echo $patientId; ?>" name="patientId"></input>
                                               <input type="hidden" value="<?php echo $prescriptionId; ?>" name = "prescriptionId"></input>
                                                <button class="mt-2 btn btn-success btn btn-lg btn-block" name="submit">SUBMIT</button>
                                                </div>
                                                </div>
    </form>
    <?php
}
else{
    $prescriptionId = $_GET["id"];
    $prescriptionId = e_d('d',$prescriptionId);

    $details = getThis("SELECT `patientID` FROM `prescription` WHERE `id`='$prescriptionId'");
    $patientId = $details[0]['patientID'];
    ?>
    <div class="app-main__outer">
                        <div class="app-main__inner">
                        <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Sample Record</h5>
                                            <form class="" action = "functionality/sampleAct.php" method = "post">
                                            <div class="table-responsive">
								<table class="table " id="dynamic_field">
                                <thead>
                                <th>Sample Name/Number</th>
                                <th>Sample Type</th>
                                <th>Remarks, If any</th>
                                <th>Add</th>
                                </thead>
									<tr>
										<td><input type="text" name="sampleName[]" placeholder="Enter The Sample Name/Number" class="form-control name_list" /></td>
										<td><input type="text" name="sampleType[]" placeholder="Enter The Sample Type" class="form-control name_list" /></td>
										<td><input type="text" name="sampleRemarks[]" placeholder="Sample Remarks (if any)" class="form-control name_list" /></td>

										<td><button type="button" name="add" id="add" class="mt-2 btn btn-success">Add More</button></td>
									</tr>
								</table>
							</div>
                                               <input type="hidden" value="<?php echo $patientId; ?>" name="patientId"></input>
                                               <input type="hidden" value="<?php echo $prescriptionId; ?>" name = "prescriptionId"></input>
                                               <input type="hidden" value="prescribed" name="typeoftest"></input>
                                                <button class="mt-2 btn btn-success btn btn-lg btn-block" name="submit">SUBMIT</button>
                                                </div>
                                                </div>
    </form>
    <?php
}
?>



                            </html>

<script>
	$(document).ready(function() {
		var i = 1;
		$('#add').click(function() {
			i++;
			$('#dynamic_field').append('<tr id="row' + i + '"> <td><input type="text" name="sampleName[]" placeholder="Enter The Sample Name/Number" class="form-control name_list" /></td><td><input type="text" name="sampleType[]" placeholder="Enter The Sample Type" class="form-control name_list" /></td><td><input type="text" name="sampleRemarks[]" placeholder="Remarks (if any)" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
		});

		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
	});
</script>
