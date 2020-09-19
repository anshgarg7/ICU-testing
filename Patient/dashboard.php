<?php include "dash_common.php"; ?>
<?php
$date = strtotime(date("Y-m-d h:i:sa"));
$difference = 0;
$appointment = getThis("SELECT `appointmentAt`,`doctorID` from `patienttoken` where `patientID` = '$id' AND `appointmentAt` >= '$date' AND `enabled` = '1' ORDER BY  `appointmentAt` ASC");

if(sizeof($appointment) > 0)
{
$appointment = $appointment[0];

$date_of_appointment = strtotime($appointment['appointmentAt']);
$difference = $date_of_appointment - $date;
if($difference < 0)
{
    $difference = -1;
}
else
{
    $difference = $difference/86400;
    $difference = ceil($difference);
}}

?>

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
                     <div class="row">

                        <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Days Since Last Visit</div>

                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php  echo "10";  ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Visits in last 30 days</div>

                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php  echo "10";  ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                      <?php
                      if($difference > 0)
                      {
                          ?>
                        <div class="col-md-6 col-xl-4">
							<div class="card mb-3 widget-content bg-midnight-bloom">
									<div class="widget-content-wrapper text-white">
										<div class="widget-content-left">
												<div class="widget-heading">Days for Next Appointment</div>
										</div>
								 		<div class="widget-content-right">
											<div class="widget-numbers text-white"><span><?php echo $difference; ?></span></div>
										</div>
									</div>
								</div>
						</div>

                        <?php
                      }
                      else if ($difference == 0 && sizeof($appointment)>0)
                      {
                      ?>
                      <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                  <div class="widget-content-left">
                      <div class="widget-heading">Appointment Today at</div>
                  </div>
                  <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?php echo substr($appointment['appointmentAt'],10,15); ?></span></div>
                  </div>
                </div>
              </div>
          </div>
        <?php } ?>
                      </div>


                      <div class="divider mt-0" style="margin-bottom: 30px;"></div>
                            <div class="main-card mb-3 card bg-midnight-bloom">
                                <div class="no-gutters row">
                                    <div class="col-md-4">
                                        <div class="widget-content ">
                                            <div class="widget-content-wrapper ">
                                                <div class="widget-content-right ml-0 mr-3  ">
                                                    <div class="widget-numbers text-white"><?php echo "70";  ?></div>
                                                </div>
                                                <div class="widget-content-left  text-white">
                                                    <div class="widget-heading">Weight</div>
                                                    <div class="widget-subheading">In KG</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-content ">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-right ml-0 mr-3">
                                                    <div class="widget-numbers text-white"><?php echo "170";  ?></div>
                                                </div>
                                                <div class="widget-content-left text-white ">
                                                    <div class="widget-heading">Heigth</div>
                                                    <div class="widget-subheading">In cms</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-content ">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-right ml-0 mr-3">
                                                    <div class="widget-numbers text-white"><?php echo "25";  ?></div>
                                                </div>
                                                <div class="widget-content-left text-white">
                                                    <div class="widget-heading">B.M.I.</div>
                                                    <div class="widget-subheading">Body Mass Index</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="divider mt-0" style="margin-bottom: 30px;"></div>
                      </div>
                </div>





</body>
</html>





<script>
$(document).ready(function(){
	var i=1;
	$('#add1').click(function(){
		i++;
		$('#dynamic_field1').append('<tr id="row'+i+'"> <td><input type="text" name="med[]" placeholder="Medicine Name" class="form-control name_list" /></td><td><input type="text" name="instruct[]" placeholder="Instructions" class="form-control name_list" /></td><td><input type="text" name="dose[]" placeholder="Dosage" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="symptoms[]" placeholder="Enter major symptoms" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>
