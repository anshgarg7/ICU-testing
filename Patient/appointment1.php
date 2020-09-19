<?php
include "dash_common.php";
$doctorID = $_POST['doctor'];
$hospitalID = $_POST['hospital'];
$date = $_POST['date'];
// echo "is this working";
// $hospitalName = getThis("SELECT `hospitalName` ")
// $_SESSION['doctorID'] = $doctorID;
// $_SESSION['hospitalID'] = $hospitalID;

$doctor = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = '$doctorID'");
$doctor = $doctor[0];

$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id` = '$hospitalID'");
$hospital = $hospital[0];
?>

<div class="app-main__outer">
    <div class="app-main__inner">
      <h3>Hospital Name : <?php echo e_d('d',$hospital['hospitalName']); ?></h3>
      <h3>Doctor Name : <?php echo e_d('d',$doctor['fullName']); ?> </h3><br><br><br>
      <?php
          $time = getThis("SELECT  `slotStartTime`, `slotEndTime` FROM `doctors` WHERE `id` = '$doctorID'");
          $time = $time[0];
        ?>


       <form action="functionality/appointmentact.php" method="post">
          <div class="wrap-input100">
    <div class="position-relative form-group"><label for="exampledoc" class=""><span class="label-input100"><h3>Available Time</h3></span></label><select class="form-control" name="appointment_time" id="doctor_c" required>
                <?php
                // for($i=0;$i<sizeof($time);$i++){
                  $startingTime = e_d('d',$time['slotStartTime']);
                  $endingTime = e_d('d',$time['slotEndTime']);
                  $startingTime = unserialize($startingTime);
                  $endingTime = unserialize($endingTime);


                  for($i=0;$i<sizeof($startingTime);$i++){
                $startTime = strtotime($startingTime[$i]);
                $endTime = strtotime($endingTime[$i]);

                for($time = $startTime;$time<$endTime; $time = strtotime("+15 minutes", $time))
                {
                  // $date = strtotime($date);
                  $time = date('H:i:s',$time);
                  $today = date('Y-m-d H:i:s');
                  $combinedDate = date('Y-m-d H:i:s',strtotime("$date $time"));
                  // echo "the combined date is ".$combinedDate;
                  $check = getThis("SELECT `appointmentAt` FROM `patienttoken` WHERE `appointmentAt` = '$combinedDate' AND `doctorID` = '$doctorID' AND `enabled` = '1'");
                  if(sizeof($check) == 0  and $combinedDate > $today)
                  {
                    ?>
                    <option value="<?php echo $combinedDate; ?>" > <?php echo $time; ?> </option>
                    <?php

                  }
                    $time = strtotime($time);
                }
              }
                // $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
                ?>
                <input type="hidden" name="hospitalid" value="<?php echo $hospitalID; ?>">
                <input type="hidden" name="doctorid" value="<?php echo $doctorID; ?>">

                  </select></div>


                  <?php
                  $prescriptions = getThis("SELECT `id`,`doctorID`, `generatedAt`FROM `prescription` WHERE `patientID` = '$id'");
                  // $prescriptions = $prescriptions[0];
                  if(sizeof($prescriptions)>0){
                  ?>
                  <h3>Prescriptions To be shown to the Doctor</h3>
                  <?php
                }
                  for($i=0;$i<sizeof($prescriptions);$i++)
                  {
                    $doctorid = $prescriptions[$i]['doctorID'];
                    $doctor = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = '$doctorid'");
                    $doctor = $doctor[0];
                    $presID = $prescriptions[$i]['id'];
                   ?>
                   <div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" name="prescrip[]" value ="<?php echo $presID; ?>" class="form-check-input" checked> <?php echo e_d('d',$doctor['fullName'])." ".substr($prescriptions[$i]['generatedAt'],0,10); ?> </label></div>
                 <?php }
                  ?>


                  <?php
                    $reports = getThis("SELECT `id`, `testName`, `testTime` FROM `labreports` WHERE `patientID` = '$id'");
                    if(sizeof($reports)>0){
                      ?>
                      <h3>Lab Reports to be shown to the doctor</h3>
                      <?php
                    }
                    for($i=0;$i<sizeof($reports);$i++)
                    {
                      $name = $reports[$i]['testName'];
                      $name = e_d('d',$name);
                      $date = $reports[$i]['testTime'];
                      $date = substr($date,0,10);
                      $reportID = $reports[$i]['id'];
                   ?>
                   <div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" name="reports[]" value ="<?php echo $reportID; ?>" class="form-check-input" checked> <?php echo $name." ".$date; ?></label></div>
                 <?php } ?>
                  <!-- <input type="submit" name="submit"> -->
                  <br><br>
                  <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Book
                  </button>



          </div>
       </form>
    </div>
  </div>
</body>
</html>
