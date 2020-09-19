<?php
include 'fxn.php';
if (isset($_POST["Country"])) {
  $temp_cid = $_POST["Country"];
  $result = getThis("SELECT `id`, `name` FROM `states` WHERE `country_id`=$temp_cid ORDER BY `name` ASC");
  echo json_encode($result);
}
if (isset($_POST["State"])) {
  $temp_sid = $_POST["State"];
  $result = getThis("SELECT `id`, `name` FROM `cities` WHERE `state_id`=$temp_sid ORDER BY `name` ASC");
  echo json_encode($result);
}

if (isset($_POST["City"])) {
  $temp_cid = $_POST["City"];
  $result = getThis("SELECT `id`, `hospitalName` FROM `hospitals` WHERE `cityID`=$temp_cid ");
  for($i = 0;$i<sizeof($result);$i++)
  $result[$i]['hospitalName'] = e_d('d',$result[$i]['hospitalName']);
  echo json_encode($result);
}

if (isset($_POST["hospital"])) {
  $temp_hid = $_POST["hospital"];
  $result = getThis("SELECT doctors.`id` as doctorID, `fullName` , `departmentID`  ,`qualificationID` ,departments.`departmentName`, qualifications.`qualificationName` FROM `doctors`,`departments`,`qualifications` WHERE doctors.`hospitalID`=$temp_hid AND departments.`id` = doctors.`departmentID` AND qualifications.`id` = doctors.`qualificationID` ORDER BY doctors.`departmentID` ASC ");
  // $result = getThis("SELECT `id`, `fullName` from `doctors` where `hospitalID` = '$temp_hid'");
  for($i = 0;$i<sizeof($result);$i++)
 { $result[$i]['fullName'] = e_d('d',$result[$i]['fullName']);
}
  echo json_encode($result);
}


if(isset($_POST["doctor"]))
{
  $temp_did = $_POST["doctor"];
  $result = getThis("SELECT `visitingDays` FROM `doctors` WHERE `id` = '$temp_did'");
  $result = $result[0]['visitingDays'];
  $result = e_d('d',$result);
  $result = unserialize($result);

  $days = [];
  foreach ($result as $d)
  {
    $temp = strtolower($d);
    if ($temp == 'sunday') $days[] = 0;
    if ($temp == 'monday') $days[] = 1;
    if ($temp == 'tuesday') $days[] = 2;
    if ($temp == 'wednesday') $days[] = 3;
    if ($temp == 'thursday') $days[] = 4;
    if ($temp == 'friday') $days[] = 5;
    if ($temp == 'satday') $days[] = 6;
  }
  // echo '<script type="text/javascript">workingDays='.json_encode($days).'</script>';
  echo json_encode($days);

}

if(isset($_POST["doctor1"]))
{
  $doctorId = $_POST["doctor1"];
  $today = date("Y-m-d");
  $result = getThis("SELECT `leaveFrom`, `leaveTo` FROM `doctorleaves` WHERE `doctorID` = '$doctorId' AND `enabled` = '1' AND `leaveTo` >= '$today' ");
$date = array();
for($i=0;$i<sizeof($result);$i++)
{
  $temp = $result[$i];
  $current = strtotime($temp['leaveFrom']);
  $end = strtotime($temp['leaveTo']);

  while($current <= $end)
  {
    $date[] = date('Y-m-d', $current);
    $current = strtotime("+1 day",$current);
  }
}

echo json_encode($date);
}

if (isset($_POST["room"])) {
  $temp_rid = $_POST["room"];
  $result = getThis("SELECT `id`, `bedNumber`,`bedUsability`, `equipmentAvailable` FROM `beds` WHERE `roomId`='$temp_rid' AND `hospitalID` = '$hospitalID' AND `enabled` = '0' ");
  // $result = getThis("SELECT `id`, `fullName` FROM `doctors` WHERE `departmentID`='$temp_did'  ");

  for ($i = 0; $i < sizeof($result); $i++) {
    $result[$i]['bedNumber'] = e_d('d', $result[$i]['bedNumber']);
    $result[$i]['bedUsability'] = e_d('d', $result[$i]['bedUsability']);
    $result[$i]['equipmentAvailable'] = e_d('d', $result[$i]['equipmentAvailable']);
  }
  echo json_encode($result);
}
