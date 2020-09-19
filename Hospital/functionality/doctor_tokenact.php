<?php
include "../../assets/fxn.php";

if(isset($_POST['submit']))
{
  $hospitalID = $_SESSION['UID'];
  $doctorID = $_POST["doctor"];
  //$doctorToken = substr(e_d('e',$doctorID."-/#".time()."-/#".rand(0,99999)),0,6);
  $doctorToken = 'abcd';
  $tokenID = doThis("INSERT INTO `doctoken`(`hospitalID`, `doctorID`, `token`) VALUES ('$hospitalID','$doctorID','$doctorToken')");
  $tokenArr = getThis("SELECT `allTokens` FROM `doctors` WHERE `id` = '$doctorID'");
  $tokenArr = $tokenArr[0]['allTokens'];
  // echo "the size of array is ".sizeof($tokenArr);
  if(isset($tokenArr) != NULL){
    $tokenArr = e_d('d',$tokenArr);
    $tokenArr = unserialize($tokenArr);
  array_push($tokenArr, $tokenID);
  // serialize($tokenArr);
}
else {
   // $tokenArr = array($tokenID);
   $tokenArr = array('0' => $tokenID );
}
$tokenArr = serialize($tokenArr);
$tokenArr = e_d('e',$tokenArr);
  $res1 = doThis("UPDATE `doctors` SET `tokenID`='$tokenID', `allTokens` = '$tokenArr' WHERE `id` = '$doctorID'");

  if($res1)
  {
    ?>
    <script>
    alert("Token Generated");
    window.location = "../token_details.php?token=<?php echo e_d('e',$doctorToken); ?>";
    </script>
    <?php
  }
  else {
    ?>
    <script>
    alert("Some Technical Error");
    window.location ="../doctor_token.php";
    </script>
    <?php
  }
}


 ?>
