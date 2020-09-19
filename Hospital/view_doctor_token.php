<?php include "dash_common.php" ?>
<?php
$check = array_filter($_POST);
if(isset($check['department'])!=null  && $check['department']!='0'){
  $departmentID = $check['department'];

  // $result = getThis("SELECT doctors.`fullName`, doctors.`phoneNumber`,doctoken.`token`,doctoken.`generatedAt`,doctoken.`lastLoginAt`, doctoken.`lastLogoutAt` FROM `doctors`,`doctoken` WHERE doctors.`tokenID` = doctoken.`id` AND doctors.`enabled`=1 AND doctoken.`enabled`=1 AND doctors.`departmentID`= '$departmentID' AND doctors.`hospitalID` = '$id'");
  $result = getThis("SELECT doctors.`fullName`, doctors.`phoneNumber`,doctoken.`token`,doctoken.`generatedAt`,doctoken.`lastLoginAt`, doctoken.`lastLogoutAt` FROM `doctors`,`doctoken` WHERE doctors.`tokenID` = doctoken.`id` AND doctors.`enabled`=1  AND doctors.`departmentID`= '$departmentID' AND doctors.`hospitalID` = '$id' ORDER BY doctoken.`generatedAt` DESC");
}else{
  $result = getThis("SELECT doctors.`fullName`, doctors.`phoneNumber`,doctoken.`token`,doctoken.`generatedAt`,doctoken.`lastLoginAt`, doctoken.`lastLogoutAt` FROM `doctors`,`doctoken` WHERE doctors.`tokenID` = doctoken.`id` AND doctors.`enabled`=1 AND doctors.`hospitalID` = '$id' ORDER BY doctoken.`generatedAt` DESC");
}

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
                          <div class="col-md-12">
                            <form action="view_doctor_token.php" method="POST">
                              <div class="wrap-input100">
                                    <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100"><h5>Department</h5></span></label><select class="form-control" name="department" id="department_c" required>
                                              <option selected disabled>Select Doctor Department</option>
                                              <?php $department = getThis("SELECT `id`, `departmentName` FROM `departments` ORDER BY `departmentName` ASC") ?>
                                              <?php foreach ($department as $k => $c) { ?>
                                              <option value="<?php echo $c['id']; ?>"><?php echo $c['departmentName']; ?></option>
                                             <?php } ?>
                                             <option value="<?php echo '0'; ?>">All Departments</option>
                                            </select></div>
                                                <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Submit</button>
                                    </div>
                                  </form>
                          </div>
                          <div class="col-md-12">
                                  <div class="main-card mb-3 card"   style="overflow-x:scroll;">
                                      <div class="card-body"><h5 class="card-title">Doctor Tokens</h5>
                                          <table class="mb-0 table table-striped">
                                              <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Doctor Name</th>
  																								<th>Phone Number</th>
  																								<th>Token</th>
                                                  <th>Generated At</th>
                                                  <th>Token Used At</th>
                                                  <th>Last Logout At</th>
                                              </tr>
                                              </thead>
                                              <tbody>
  																							<?php
                                                foreach ($result as $key => $UL) {
                                                  ?>
                                              <tr>
                                                  <th>#</th>
                                                  <td>
  																									<?php echo e_d('d',$UL['fullName']); ?>
  																								</td>
  																								<td>
  																									<?php echo e_d('d',$UL['phoneNumber']); ?>
  																								</td>
                                                  <td>
                                                    <?php echo $UL['token']; ?>
                                                  </td>
                                                  <td>
                                                    <?php $date = date('<b>d M</b> Y <b>h.i.s A</b>',strtotime($UL['generatedAt'])); ?>
                                                    <?php echo $date; ?>
                                                  </td>
                                                  <td>
                                                    <?php if($UL['lastLoginAt']!=null){ ?>
                                                    <?php $date1 = date('<b>d M</b> Y <b>h.i.s A</b>',strtotime($UL['lastLoginAt'])); ?>
                                                    <?php echo $date1; ?>
                                                  <?php }else{
                                                    echo "Not Yet";
                                                  } ?>
                                                  </td>
                                                  <td>
                                                    <?php if($UL['lastLogoutAt']!=null){ ?>
                                                    <?php $date2 = date('<b>d M</b> Y <b>h.i.s A</b>',strtotime($UL['lastLogoutAt'])); ?>
                                                    <?php echo $date2; ?>
                                                  <?php }else{
                                                    echo "Not Yet";
                                                  } ?>
                                                  </td>
                                              </tr>
                                            <?php } ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                        </div>

														</div>
													</div>
												</body>
												</html>


												<script type="text/javascript">
												$(document).ready(function(){
												    $("#department_c").change(function(){
												      var departmentID = $("#department_c").val();
												      $.ajax({
												        url: '../assets/worldData.php',
												        method: 'post',
												        data: 'department='+departmentID
												      }).done(function(departments){
												        doctors = JSON.parse(departments);
												        $('#doctor_c').empty();
												        $('#doctor_c').append('<option disabled selected>Select Doctor</option>');
												        doctors.forEach(function(doctor){
												          $('#doctor_c').append('<option value='+doctor.id+'>'+doctor.fullName+'</option>');
												        })
												        $('#doctor_c').append('<option value=0>My option is not listed</option>');
												      })
												    });
													})
													</script>
