<?php
include 'fxn.php';

if (isset($_POST["Country"])) {
  $temp_cid = $_POST["Country"];
  // $result = getThis("SELECT `id`, `name` FROM `states` WHERE `country_id`=$temp_cid ORDER BY `name` ASC");
  $result = getThis("SELECT `id`, `name` FROM `states` WHERE `country_id`= '101' ORDER BY `name` ASC");

  echo json_encode($result);
}

$hospitalID = $_SESSION['UID'];
if (isset($_POST["department"])) {
  $temp_did = $_POST["department"];
  $result = getThis("SELECT `id`, `fullName` FROM `doctors` WHERE `departmentID`='$temp_did' AND `hospitalID` = '$hospitalID' ");
  // $result = getThis("SELECT `id`, `fullName` FROM `doctors` WHERE `departmentID`='$temp_did'  ");

  for($i=0;$i<sizeof($result);$i++)
  {
    $result[$i]['fullName'] = e_d('d',$result[$i]['fullName']);
  }
  echo json_encode($result);
}


if (isset($_POST["State"])) {
  $temp_sid = $_POST["State"];
  $result = getThis("SELECT `id`, `name` FROM `cities` WHERE `state_id`=$temp_sid ORDER BY `name` ASC");
  echo json_encode($result);
}
?>
