<?php
include "../../assets/fxn.php";
if(isset($_POST['submit']))
{
$questionID = $_POST['questionID'];
$patientID = $_POST['patientID'];
$answer = $_POST['answer'];
$doctorID = '0';

$temp = array('doctor' => $doctorID,
                    'patient' => $patientID,
                    'answer' => $answer);

$temp = serialize($temp);

$ansArray = getThis("SELECT `id`,`answer` FROM  `discussion` WHERE `id` = '$questionID'");
$ansArray = $ansArray[0]['answer'];
if(isset($ansArray)!=NULL )
{
  $ansArray = e_d('d',$ansArray);
  $ansArray = unserialize($ansArray);
  array_push($ansArray, $temp);
  $ansArray = serialize($ansArray);
  $ansArray = e_d('e',$ansArray);
}
else {
  // $newArray = $temp;
  $newArray = array('0' => $temp);
  $newArray = serialize($newArray);
  $ansArray = e_d('e',$newArray);
}

$res = doThis("UPDATE `discussion` SET `answer`= '$ansArray' WHERE `id` = '$questionID'");
if($res)
{
  ?>
  <script>
  alert("Answer Added Successfully!!");
  window.location = "../discussion.php";
  </script>
  <?php
}
else {
  ?>
  <script>
  alert("There is Some Technical Error !!");
  window.location = "../discussion.php";
  </script>
  <?php
}
}
 ?>
