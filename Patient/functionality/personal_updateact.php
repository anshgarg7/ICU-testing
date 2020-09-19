<?php

include "../../assets/fxn.php";

$patientID = $_SESSION["UID"];
$name = e_d('e',$_POST['fullName']);
$phone = e_d('e',$_POST['phoneNumber']);
$email = e_d('e',$_POST['emailAddress']);
$address = e_d('e',$_POST['addressLine1']);
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$username = e_d('e',$_POST['username']);

if(isset($_POST['submit'])){
  $username_check = getThis("SELECT `id` FROM `patients` WHERE `username`='$username' AND `id`!='$patientID'");
  if(sizeof($username_check)>0){
    ?>
    <script> alert("The Username is already present");
      window.location='../personal_update.php';
    </script>
    <?php
  }else{
    doThis("UPDATE `patients` SET `fullName`='$name',`phoneNumber`='$phone',`emailAddress`='$email',`addressLine1`='$address',`cityID`='$city',`stateID`='$state',`countryID`='$country',`username`='$username' WHERE `id`='$patientID'");
    ?>
    <script>
        alert("Update Successful!!");
        window.location = "../personal_details.php";
        </script>
    <?php
  }
}

?>
