<?php
include "../../assets/fxn.php";


if(isset($_POST['submit']))
{
  $departmentID = $_POST['department'];
  $doctorID = $_POST['doctor'];
  $visitingDays = $_POST['visitingDays'];
  $startTime = $_POST['start_slot'];
  $endTime = $_POST['end_slot'];
  $visitingDays = e_d('e',serialize($visitingDays));
  $startTime = e_d('e',serialize($startTime));
  $endTime = e_d('e',serialize($endTime));


  $res = doThis("UPDATE `doctors` SET `slotStartTime`= '$startTime',`slotEndTime`= '$endTime',`visitingDays`= '$visitingDays' WHERE `id` = '$doctorID'");

  if($res)
  {
    ?>
    <script>
    alert("Time Set Successfully!!");
    window.location = "../time_slots.php";
    </script>
    <?php
  }
  else {
    ?>
    <script>
    alert("There is some technical error!");
    window.location = "../time_slots.php";
    </script>
    <?php
  }
}

 ?>
