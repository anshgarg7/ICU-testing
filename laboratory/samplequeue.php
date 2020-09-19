<?php
include "dash_common.php";
$nullvalue = e_d('e','a:1:{i:0;s:0:"";}');
$result = getThis("SELECT prescription.`id` AS pid, `doctorID`, `patientID`, `labTestAdvice`, `generatedAt`, `updatedAt` FROM `prescription`,`laboratories` WHERE prescription.`hospitalID` = laboratories.`hospitalId` AND prescription.`labTestAdvice` != '$nullvalue'");

?>
<div class="app-main__outer">
    <div class="app-main__inner">
      <div class="main-card mb-3 card">
        <div class="row">
          <?php if(sizeof($result)!=NULL){ ?>
          <div class="col-md-12">
            <div class="card-body"><h5 class="card-title">Referred Patients</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Referred By</th>
                        <th>Tests Referred</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        for($i=0;$i<sizeof($result);$i++)
                        {
                          $LL=$result[$i];
                            ?>
                            <tr>
                            <td><?php echo $i+1; ?> </td>
                            <?php $patientID = $LL['patientID'];
                            $patient = getThis("SELECT `id`, `fullName`, `username` FROM `patients` WHERE `id` = $patientID");
                            $patient = $patient[0];?>
                            <td><?php echo e_d('d',$patient['fullName']); ?> </td>
                            <?php $doctorID = $LL['doctorID'];
                            $doctor = getThis("SELECT `id`, `fullName` FROM `doctors` WHERE `id` = $doctorID");
                            $doctor = $doctor[0];?>
                            <td><?php echo e_d('d',$doctor['fullName']); ?> </td>
                            <td><?php
                            $tests = e_d('d',$LL['labTestAdvice']);
                            $tests = unserialize($tests);
                            for($j=0;$j<sizeof($tests);$j++)
                            {
                                echo $tests[$j]."<br>";
                            }
                            ?></td>
                                <td><a href="patient_test.php?id=<?php echo $patient['username']; ?>" class="btn btn-primary">Take Sample</a></td>
                            </tr>
                            <?php
                        }?>
                    </tbody>
                    </table>
                    </div>
          </div>
        <?php } ?>
          <div class="col-md-12">
            <div class="card-body"><h5 class="card-title">Attend Patient</h5>
                <form class="" action="patient_test.php" method="post">
        <div class="position-relative form-group"><label for="exampleAddress" class="">Username</label><input name="username" id="exampleAddress" placeholder="Username of the Patient" type="text" class="form-control"></div>
        <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" name="submit">Submit</button>
      </form>
    </div>
          </div>
        </div>

</div>
    </div>
  </div>
</body>
</html>
