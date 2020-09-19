<?php
 include "dash_common.php";

$prescriptionID = $_GET['id'];
$prescriptionID = e_d('d',$prescriptionID);
$prescriptionDetails = getThis("SELECT  `doctorID`, `symptoms`, `dietAdvice`, `specialAdvice`, `medicinePrescribed`, `medicineDosage`, `medicineInstructions`, `generatedAt` FROM `prescription` WHERE `id` = '$prescriptionID'");
$prescriptionDetails = $prescriptionDetails[0];
// $hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalId'");
// $hospital = $hospital[0];
?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card-body"><h5 class="card-title">Prescritpion Details</h5>
                                        <table class="mb-0 table table-striped">
                                            <tr>
                                                <td>Doctor Name</td>
                                                <td><?php
                                                $doctorId = $prescriptionDetails['doctorID'];
                                                $name = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = '$doctorId'");
                                                echo e_d('d',$name[0]['fullName']);
                                                ?></td>

                                            </tr>
                                            <!-- <tr>
                                            <td>Hospital Name</td>
                                                <td><?php
                                                // $hospitalId = $prescriptionDetails['hospitalID'];
                                                // $name = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id` = '$hospitalId'");
                                                // echo e_d('d',$name[0]['hospitalName']);
                                                ?></td>
                                            </tr> -->
                                            <tr>
                                                <td>Consultation Date</td>
                                                <td><?php echo substr($prescriptionDetails['generatedAt'],0,10); ?></td>
                                            </tr>
                                            <tr>
                                            <td>Special Advice</td>
                                                <td><?php
                                                echo e_d('d',$prescriptionDetails['specialAdvice']);
                                                ?></td>
                                            </tr>
                                            <tr>
                                            <td>Diet Advice</td>
                                                <td><?php
                                                echo e_d('d',$prescriptionDetails['dietAdvice']);
                                                ?></td>
                                            </tr>
																						<!-- <tr>
                                            <td>Follow Up Days</td>
                                                <td><?php
                                                // echo $prescriptionDetails['days'];
                                                ?></td>
                                            </tr> -->
                                            <tr>
                                            <td>Symptoms</td>
                                                <td><?php
                                               $temp = e_d('d',$prescriptionDetails['symptoms']);
                                               $temp = unserialize($temp);

                                               for($i=0;$i<sizeof($temp);$i++)
                                               {
                                                   echo $temp[$i]."<br>";
                                               }
                                                ?></td>
                                            </tr>
                                        </table>
        </div>

        <div class="card-body"><h5 class="card-title">Medicine Details</h5>
            <table class="mb-0 table table-striped">
                <thead>
                    <th>Medicine Prescribed</th>
                    <th>Dosage</th>
                    <th>Instructions</th>
                </thead>
                <tbody>
                    <?php
                    $med = e_d('d',$prescriptionDetails['medicinePrescribed']);
                    $med = unserialize($med);
                    $dose = e_d('d',$prescriptionDetails['medicineDosage']);
                    $dose = unserialize($dose);
                    $instructions = e_d('d',$prescriptionDetails['medicineInstructions']);
                    $instructions = unserialize($instructions);

                    for($i=0;$i<sizeof($med); $i++)
                    {
                        ?>
                        <tr>
                            <td>
                                <?php echo $med[$i]; ?>
                            </td>
                            <td>
                                <?php echo $dose[$i]; ?>
                            </td>
                            <td>
                                <?php echo $instructions[$i]; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>


                </tbody>

</table>
</div>


								<?php
								// $reportID = $_GET['rep'];
								// $reportID = e_d('d',$reportID);
								if($prescriptionID != 0){
								$report = getThis("SELECT `laboratoryID`, `testName`, `reportLink`, `testTime` FROM `labreports` WHERE `prescriptionID` = '$prescriptionID' AND `enabled` = '1'");

								if(sizeof($report)>0){
								$report = $report[0];
								?>
								<div class="main-card mb-3 card">
														<div class="no-gutters row">
																<div class="col-md-4">
																		<div class="pt-0 pb-0 card-body">
																				<ul class="list-group list-group-flush">

																						<li class="list-group-item">
																								<div class="widget-content p-0">
																										<div class="widget-content-outer">
																												<div class="widget-content-wrapper">
																														<div class="widget-content-left">
																																<div class="widget-heading">Test Name</div>

																														</div>
																														<div class="widget-content-right">
																																<div class="widget-numbers text-primary"><?php echo e_d('d',$report['testName']); ?></div>
																														</div>
																												</div>
																										</div>
																								</div>
																						</li>
																				</ul>
																		</div>
																</div>
																<div class="col-md-4">
																		<div class="pt-0 pb-0 card-body">
																				<ul class="list-group list-group-flush">

																						<li class="list-group-item">
																								<div class="widget-content p-0">
																										<div class="widget-content-outer">
																												<div class="widget-content-wrapper">
																														<div class="widget-content-left">
																																<div class="widget-heading">Conducted By</div>

																														</div>
																														<div class="widget-content-right">
																																<div class="widget-numbers text-primary"><?php  $labID  =  $report['laboratoryID'];

																																 	$laboratory = getThis("SELECT `laboratoryName` from `laboratories` where `id` = '$labID' AND `enabled` = '1'");
																																	$laboratory = $laboratory[0];
																																	echo $laboratory['laboratoryName'];
																																	?></div>
																														</div>
																												</div>
																										</div>
																								</div>
																						</li>
																				</ul>
																		</div>
																</div>
																<div class="col-md-4">
																		<div class="pt-0 pb-0 card-body">
																				<ul class="list-group list-group-flush">
																						<li class="list-group-item">
																								<div class="widget-content p-0">
																										<div class="widget-content-outer">
																												<div class="widget-content-wrapper">
																														<div class="widget-content-left">
																																<div class="widget-heading">Conducted On</div>

																														</div>
																														<div class="widget-content-right">
																																<div class="widget-numbers text-primary"><?php
																																$date = $report['testTime'];
																																echo substr($date,0,10); ?></div>
																														</div>
																												</div>
																										</div>
																								</div>
																						</li>

																				</ul>
																		</div>
																</div>
														</div>
												</div>
												<?php

										$link = $report['reportLink'];
										$link = e_d('d',$link);
										?>
												<iframe src="<?php echo $link; ?>"  width="1150" height="450" style="float:none"></iframe>
								<?php }
							} ?>

</div>
</div>
</div>
