<?php
include "dash_common.php";
$ipdId =  $_GET["id"];
$ipdId = e_d('d', $ipdId);
$vitals = getThis("SELECT `id`, `ipdlogID`, `vitalBP`, `vitalHeartRate`, `vitalRecordedAt`, `enabled` FROM `vitals` WHERE `ipdlogID`='$ipdId'");
$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalId'");
$hospital = $hospital[0];

?>

                <!-- form area starts -->
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">

																	<div><?php echo $roomName; ?> Room Dashboard
							                        <div class="page-title-subheading"><?php echo $roomDescription; ?>
							                        </div>
							                    </div>
                                </div>
                               </div>
                        </div>
                        <div class="row">
                          <?php if($vitals!=null){
													if(sizeof($vitals)>0){ ?>
													<div class="col-md-12">
														<div class="main-card mb-3 card"   style="overflow-x:scroll;">
																<div class="card-body"><h5 class="card-title">Patient Vitals</h5>
																		<table class="mb-0 table table-striped">
																				<thead>
																				<tr>
																						<th>#</th>
																						<th>Blood Pressure</th>
																						<th>Heart Rate</th>
																						<th>Recorded At</th>
																				</tr>
																				</thead>
																				<tbody>
																					<?php
																					for ($j=0; $j < sizeof($vitals); $j++) {
																						$result = $vitals[$j];
                                            $vitalBP = e_d('d',$result['vitalBP']);
                                            $vitalBP = unserialize($vitalBP);
                                            $vitalHeartRate = e_d('d',$result['vitalHeartRate']);
                                            $vitalHeartRate = unserialize($vitalHeartRate);
                                            $vitalRecordedAt = e_d('d',$result['vitalRecordedAt']);
                                            $vitalRecordedAt = unserialize($vitalRecordedAt);
                                            for($i=0;$i<sizeof($vitalBP);$i++)
                                            {
                                              ?>
                                              <th>#</th>
                                              <?php
                                              ?>
                                              <td>
                                                <?php
                                                echo $vitalBP[$i];
                                                 ?>
                                              </td>
                                              <?php
                                              ?>
                                              <td>
                                                <?php
                                                echo $vitalHeartRate[$i];
                                                 ?>
                                              </td>
                                              <?php?>
                                              <td>
                                                <?php
                                                echo $vitalRecordedAt[$i];
                                                 ?>
                                              </td>
                                            <?php } ?>
																				<tr>
                                        <?php }?>
																				</tbody>
																		</table>

																</div>
														</div>
													</div>
												<?php }}else{ ?>
												<div class="col-md-12 col-xl-12">
														<div class="card mb-3 widget-content bg-grow-early">
															<div class="card-body"><h5 class="card-title" style="color:white;"></h5>
																					<h2>NO Vitals Recorded YET</h2>
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
