<?php
include "../../assets/fxn.php";
if(isset($_POST["submit"])){
$question = $_POST['question'];
$patientID = $_POST['patientID'];
$question = e_d('e',$question);
$res = doThis("INSERT INTO `discussion`(`patientID`, `question`, `askedAt`) VALUES('$patientID','$question',CURRENT_TIMESTAMP())");

if($res)
{
  ?>
  <script>
  alert("Question Asked Successfully !!");
  window.location = "../discussion.php";
  </script>
  <?php
}
else {
  ?>
  <script>
alert("There Is Some Technical Error! Please Try After Sometime");
  window.location = "../discussion.php";
  </script>
<?php
}
}
 ?>
