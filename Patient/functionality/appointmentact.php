<?php
include "../../assets/fxn.php";
$patientID = $_SESSION["UID"];


if(isset($_POST['submit']))
{
  $appointment = $_POST['appointment_time'];
  $hospitalID = $_POST["hospitalid"];
  $doctorID = $_POST["doctorid"];
  $patientToken = substr(e_d('e',get_client_ip()."-/#".time()."-/#".rand(0,99999)),0,6);
  $init_res = doThis("INSERT INTO `patienttoken`(`hospitalID`, `doctorID`, `patientID`,`token` ,`generatedAt`, `appointmentAt`) VALUES ('$hospitalID','$doctorID','$patientID','$patientToken',CURRENT_TIMESTAMP(),'$appointment')");



if(isset($_POST['prescrip'])!=null){
if(strlen(trim($_POST['prescrip'][0]))!=0){
  $prescription = $_POST['prescrip'];
  $prescription = serialize($prescription);
  $prescription = e_d('e',$prescription);
  $res = doThis("UPDATE `patienttoken` SET `prescriptionView`= '$prescription' WHERE `token` = '$patientToken'");
  }
}
if(isset($_POST['reports'])!=null){
if(strlen(trim($_POST['reports'][0]))!=0){
  $reports = $_POST['reports'];
  $reports = serialize($reports);
  $reports = e_d('e',$reports);
  $res1 = doThis("UPDATE `patienttoken` SET `laboratoryReportsView`= '$reports' WHERE `token` = '$patientToken'");
}
}


// $prescription = $_POST['prescrip'];
// if(sizeof($prescription) > 0)
// {
//   $prescription = serialize($prescription);
//   $prescription = e_d('e',$prescription);
// }
// else {
//   $prescription = 'NULL';
// }
//
// $reports = $_POST['reports'];
// if(sizeof($reports) > 0)
// {
//   $reports = serialize($reports);
//   $reports = e_d('e',$reports);
// }
// else {
//   $reports = 'NULL';
// }
//
// $res = doThis("INSERT INTO `patienttoken`(`hospitalID`, `doctorID`, `patientID`,`token` ,`generatedAt`, `appointmentAt`,`prescriptionView`, `laboratoryReportsView`) VALUES ('$hospitalID','$doctorID','$patientID','$patientToken',CURRENT_TIMESTAMP(),'$appointment','$prescription','$reports')");
  if($init_res)
  {
    ?>
    <script>
    alert("Appointment Registered!!");
    window.location = "../dashboard.php";
    </script>
    <?php
  }
  else {
    ?>
    <script>
    alert("Some Technical Error");
    window.location ="../dashboard.php";
    </script>
    <?php
  }
}


 ?>
