<?php include "dash_common.php" ?>
<?php
$check = array_filter($_POST);
if(isset($check['department'])!=null && $check['department']!='0'){
  $departmentID = $check['department'];

  // $result = getThis("SELECT doctors.`fullName`, doctors.`phoneNumber`,doctoken.`token`,doctoken.`generatedAt`,doctoken.`lastLoginAt`, doctoken.`lastLogoutAt` FROM `doctors`,`doctoken` WHERE doctors.`tokenID` = doctoken.`id` AND doctors.`enabled`=1 AND doctoken.`enabled`=1 AND doctors.`departmentID`= '$departmentID' AND doctors.`hospitalID` = '$id'");
  $result = getThis("SELECT doctors.`id`, doctors.`fullName`, doctors.`phoneNumber`,doctors.`currentActivity`, doctors.`emailAddress`, doctors.`dob`, doctors.`addressLine1`, doctors.`cityID`, doctors.`stateID`, doctors.`countryID`, doctors.`username`, doctors.`consultationFee`, doctors.`slotStartTime`, doctors.`slotEndTime`, doctors.`visitingDays`, doctors.`lastLogin`, doctors.`createdAt`, departments.`departmentName`, qualifications.`qualificationName`, doctorsalary.`basicPay`, doctorsalary.`allowance` FROM `doctors`, `departments`, `qualifications`, `doctorsalary` WHERE `hospitalID` ='$id' AND doctors.`enabled`=1 AND departments.`enabled`=1 AND doctors.`departmentID`=departments.`id` AND doctors.`departmentID` = '$departmentID' AND doctors.`qualificationID` = qualifications.`id` AND doctors.`id` = doctorsalary.`doctorID` ORDER BY doctors.`departmentID` ASC");
}else {
  $result = getThis("SELECT doctors.`id`, doctors.`fullName`, doctors.`phoneNumber`,doctors.`currentActivity`, doctors.`emailAddress`, doctors.`dob`, doctors.`addressLine1`, doctors.`cityID`, doctors.`stateID`, doctors.`countryID`, doctors.`username`, doctors.`consultationFee`, doctors.`slotStartTime`, doctors.`slotEndTime`, doctors.`visitingDays`, doctors.`lastLogin`, doctors.`createdAt`, departments.`departmentName`, qualifications.`qualificationName`, doctorsalary.`basicPay`, doctorsalary.`allowance` FROM `doctors`, `departments`, `qualifications`, `doctorsalary` WHERE `hospitalID` = '$id' AND doctors.`enabled`=1 AND departments.`enabled`=1 AND doctors.`departmentID`=departments.`id` AND doctors.`qualificationID` = qualifications.`id` AND doctors.`id` = doctorsalary.`doctorID` ORDER BY doctors.`departmentID` ASC");
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
                            <form action="view_doctors.php" method="POST">
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
                                                  <th>Doctor</th>
  																								<th>Department</th>
                                                  <th>Joined On</th>
                                                  <th>Availabilty</th>
                                                  <th>Actions</th>
                                              </tr>
                                              </thead>
                                              <tbody>
  																							<?php
                                                foreach ($result as $key => $UL) {
                                                  ?>
                                              <tr>
                                                  <th>#</th>
                                                  <td>
  																									<?php echo e_d('d',$UL['fullName'])."(".$UL['qualificationName'].")"; ?>
                                                    <hr style="margin:2px;">
                                                    <?php echo e_d('d',$UL['phoneNumber']); ?>
                                                    <hr style="margin:2px;">
                                                    <?php echo e_d('d',$UL['emailAddress']); ?>
  																								</td>
  																								<td>
  																									<?php echo $UL['departmentName']; ?>
  																								</td>
                                                  <td>
                                                    <?php $date = date('<b>d M</b> Y <b>h.i.s A</b>',strtotime($UL['createdAt'])); ?>
                                                    <?php echo $date; ?>
                                                  </td>
                                                  <td>
                                                    <?php $available = $UL['currentActivity'];
                                                    if($available == 1)
                                                    {
                                                      echo "Available In Cabin";
                                                    }
                                                    else if($available ==2)
                                                    {
                                                      echo "On An IPD inspection";
                                                    }
                                                    else if($available == 3)
                                                    {
                                                      echo "In a Surgery";
                                                    }
                                                    else if($available == 0)
                                                    {
                                                      echo "Unavailable Right Now";
                                                    }
                                                    ?>
                                                  </td>
                                                  <td>
                                                    <a class="mb-2 mr-2 btn btn-primary" id="<?php echo $UL['id'];?>" href="doctor.php?id=<?php echo e_d('e',$UL['id']); ?>">View</a>
      																							<a class="mb-2 mr-2 btn btn-primary" id="<?php echo $UL['id'];?>" href="update_doctor.php?id=<?php echo e_d('e',$UL['id']); ?>">Update</a>
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
