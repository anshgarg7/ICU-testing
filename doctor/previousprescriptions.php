<?php
include "dash_common.php";
$ipdId =  $_GET["id"];
$ipdId = e_d('d', $ipdId);
$previousprescriptions = getThis("SELECT `id`,`symptoms`,`medicinePrescribed`, `generatedAt`, `updatedAt` FROM `prescription` WHERE `ipdID`='$ipdId' ORDER BY `generatedAt` DESC");
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
                          <?php if($previousprescriptions!=null){
													if(sizeof($previousprescriptions)>0){ ?>
													<div class="col-md-12">
														<div class="main-card mb-3 card"   style="overflow-x:scroll;">
																<div class="card-body"><h5 class="card-title">Previous Prescriptions</h5>
																		<table class="mb-0 table table-striped">
																				<thead>
																				<tr>
																						<th>#</th>
																						<th>Symptoms</th>
																						<th>Medication</th>
																						<th>Prescription Date</th>
																						<th>Action</th>
																				</tr>
																				</thead>
																				<tbody>
																					<?php
																					for ($j=0; $j < sizeof($previousprescriptions); $j++) {
																						$result = $previousprescriptions[$j];
																					?>
																				<tr>
																						<th>#</th>
																						<td>
																							<?php
																							$symptoms = e_d('d',$result['symptoms']);
		                                          $symptoms = unserialize($symptoms);
		                                          for($i=0;$i<sizeof($symptoms);$i++)
		                                          {
																								echo $symptoms[$i];
																								echo "<br>";
																							} ?>
																						</td>
																						<td>
																							<?php
																							$medicine = e_d('d',$result['medicinePrescribed']);
		                                          $medicine = unserialize($medicine);
		                                          for($i=0;$i<sizeof($medicine);$i++)
		                                          {
																								echo $medicine[$i];
																								echo "<br>";
																							} ?>
																						</td>
																						<?php $date = date('<b>d M</b> Y <b>h.i.s A</b>',strtotime($result['generatedAt'])); ?>
																						<td><?php echo $date; ?></td>
																						<td>
																							<a class="mb-2 mr-2 btn btn-primary" id="<?php echo $result['id'];?>" href="viewprescription.php?id=<?php echo e_d('e',$result['id']); ?>">View</a>
																						</td>
																				</tr>
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
