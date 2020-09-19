<?php
include "../../assets/fxn.php";

$id = $_GET['id'];
$id = e_d('d',$id);
$res = doThis("UPDATE `patienttoken` set `enabled` = '0' WHERE `id` = '$id' ");


if($res)
{
  ?>
  <script>
    alert("Appointment Cancelled!!!");
    window.location = "../appointment_details.php";
  </script>
  <?php
}
else {
  ?>
  <script>
    alert("There Is Some Technical Error!!");
    window.location = "../appointment_details.php";
  </script>
  <?php
}
 ?>
