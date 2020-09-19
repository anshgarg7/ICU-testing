<?php include "dash_common.php" ?>
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
      <?php if (isset($_SESSION['doctor'])){?>
      <div class="col-md-12">
          <div class="main-card mb-3 card" style="overflow-x:scroll;">
              <div class="card-body">
                  <h5 class="card-title">Current Doctor on Duty</h5>
                  <table class="mb-0 table table-striped">
                      <tbody>
                          <tr>
                              <td>
                                Doctor Name
                              </td>
                              <td>
                                <?php $doctorID = $_SESSION['doctor'];
                                $doctor = getThis("SELECT * FROM `doctors` WHERE `id`='$doctorID'");
                                $doctor = $doctor[0];
                                echo e_d('d',$doctor['fullName']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Department Name
                              </td>
                              <td><?php $departmentID = $_SESSION['department'];
                              $departmentdata = getThis("SELECT * FROM `departments` WHERE `id`='$departmentID'");
                              $departmentdata = $departmentdata[0];
                              echo e_d('d',$departmentdata['departmentName']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Email Address
                              </td>
                              <td>
                                <?php echo e_d('d',$doctor['emailAddress']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Phone Number
                              </td>
                              <td>
                                  <?php echo e_d('d',$doctor['phoneNumber']); ?>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    <?php } ?>

    <div class="col-md-12">
		<form action="functionality/ondutydoctoract.php" method="post">
			<div class="wrap-input100">
				<div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">
							<h5>Department</h5>
						</span></label><select class="form-control" name="department" id="department_c" required>
						<option selected disabled>Select Doctor Department</option>
						<?php $department = getThis("SELECT `id`, `departmentName` FROM `departments` ORDER BY `departmentName` ASC") ?>
						<?php foreach ($department as $k => $c) { ?>
							<option value="<?php echo $c['id']; ?>"><?php echo e_d('d',$c['departmentName']); ?></option>
						<?php } ?>
					</select></div>
				<div class="wrap-input100">
					<div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">
								<h5>Doctors</h5>
							</span></label><select class="form-control" name="doctor" id="doctor_c" required>
							<option disabled selected>Select Department First</option>
						</select></div>
				</div>
				<button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Select As On-Duty Doctor</button>
			</div>

		</form>
    </div>
    </div>
	</div>
</div>
</body>

</html>


<script type="text/javascript">
	$(document).ready(function() {
		$("#department_c").change(function() {
			var departmentID = $("#department_c").val();
			$.ajax({
				url: '../assets/worldData.php',
				method: 'post',
				data: 'department=' + departmentID
			}).done(function(departments) {
				doctors = JSON.parse(departments);
				$('#doctor_c').empty();
				$('#doctor_c').append('<option disabled selected>Select Doctor</option>');
				doctors.forEach(function(doctor) {
					$('#doctor_c').append('<option value=' + doctor.id + '>' + doctor.fullName + '</option>');
				})
				$('#doctor_c').append('<option value=0>My option is not listed</option>');
			})
		});
	})
</script>
