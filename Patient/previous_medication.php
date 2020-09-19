<?php
include "dash_common.php";
$medicaldetails = getThis("SELECT `previousMedication`, `previousDiseases` FROM `patients` WHERE `id` = '$id'");
$medicaldetails = $medicaldetails[0];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="app-main__outer">
                    <div class="app-main__inner">
                    <div class="tab-content">
                      <div class="row">
                        <?php if($medicaldetails['previousDiseases']!=null){ ?>
                        <div class="col-md-6">
                          <div class="main-card mb-3 card"   style="overflow-x:scroll;">
                              <div class="card-body"><h5 class="card-title">Previous Diseases</h5>
                                  <table class="mb-0 table table-striped">
                                      <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Disease</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          $diseases = e_d('d',$medicaldetails['previousDiseases']);
                                          $diseases = unserialize($diseases);
                                          for($i=0;$i<sizeof($diseases);$i++)
                                          {
                                            ?>
                                            <tr>
                                            <th><?php echo $i+1; ?></th>
                                            <td><?php echo $diseases[$i]; ?></td>
                                            </tr>
                                            <?php } ?>
                                      </tbody>
                                  </table>

                              </div>
                          </div>
                        </div>
                      <?php } ?>
                      <?php if($medicaldetails['previousMedication']!=null){ ?>
                        <div class="col-md-6">
                          <div class="main-card mb-3 card"   style="overflow-x:scroll;">
                              <div class="card-body"><h5 class="card-title">Previous Medication</h5>
                                  <table class="mb-0 table table-striped">
                                      <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Medicines</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          $medicines = e_d('d',$medicaldetails['previousMedication']);
                                          $medicines = unserialize($medicines);
                                          for($i=0;$i<sizeof($medicines);$i++)
                                          {
                                            ?>
                                            <tr>
                                            <th><?php echo $i+1; ?></th>
                                            <td><?php echo $medicines[$i]; ?></td>
                                            </tr>
                                          <?php } ?>
                                      </tbody>
                                  </table>

                              </div>
                          </div>
                        </div>
                      <?php } ?>
                        <div class="col-md-12">
                          <div class="main-card mb-3 card">
                              <div class="card-body"><h5 class="card-title">Your Previous Medical History</h5>
                                  <form class="" action="functionality/medicationact.php" method="post">
                                    <b>Major Past Diseases</b>
                                    <div class="table-responsive">
                                      <table class="table " id="dynamic_field">
                                        <tr>
                                          <td><input type="text" name="diseases[]" placeholder="Enter major past diseases" class="form-control name_list" /></td>
                                          <td><button type="button" name="add" id="add" class="mt-2 btn btn-primary">Add More</button></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <b>Major Past Medication</b>
                                    <div class="table-responsive">
                                      <table class="table " id="dynamic_field1">
                                        <tr>
                                          <td><input type="text" name="medicine[]" placeholder="Enter major past medication" class="form-control name_list" /></td>
                                          <td><button type="button" name="add1" id="add1" class="mt-2 btn btn-primary">Add More</button></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" name="submit" type="submit">Submit</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



<script>
$(document).ready(function(){
	var i=1;
	$('#add1').click(function(){
		i++;
		$('#dynamic_field1').append('<tr id="row'+i+'"><td><input type="text" name="medicine[]" placeholder="Enter major past medication" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>

<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="diseases[]" placeholder="Enter major past disease" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>
