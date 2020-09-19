<?php
include "../../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
  <script type="text/javascript">
    window.location = 'logout.php';
  </script>
<?php
}

if (isset($_POST['submit'])) {
  $hospitalID = $_POST['hospitalID'];
  $roomID = $_SESSION["UID"];
  $patientName = $_POST['patientName'];
  $patientName = rtrim($patientName);
  $patientName = trim($patientName);
  $patientName = e_d('e', $patientName);
  $phoneNumber = e_d('e', trim($_POST['phoneNumber']));
  $emailAddress = e_d('e', trim($_POST['emailAddress']));
  $addressLine1 = e_d('e', $_POST['addressLine1']);
  $cityID = $_POST['city'];
  $stateID = $_POST['state'];
  $countryID = $_POST['country'];
  $patientName = e_d('e', $_POST['patientName']);
  $patientName = e_d('e', $_POST['patientName']);
  $previousMed = $_POST['previousMedication'];
  $previousMed = serialize($previousMed);
  $previousMed = e_d('e', $previousMed);
  $previousDiseases = $_POST['previousDiseases'];
  $previousDiseases = serialize($previousDiseases);
  $previousDiseases = e_d('e', $previousDiseases);
  $allergies = $_POST['allergicReactions'];
  $allergies = serialize($allergies);
  $allergies = e_d('e', $allergies);
  $familyHistory = e_d('e', $_POST['familyHistory']);
  $foodHabits = $_POST['foodHabits'];
  $foodHabits = serialize($foodHabits);
  $foodHabits = e_d('e', $foodHabits);
  $flag = $_POST['flag'];
  $prescriptionID = NULL;
  $patientID = NULL;
  $bed = $_POST["bed"];
  $emergencyContact = $_POST["emergency"];
  if ($flag == 1) {
    $patientID = getThis("SELECT `id` FROM `patients` WHERE `phoneNumber`='$phoneNumber' ");
    $patientID = $patientID[0]["id"];
    $res = doThis("UPDATE `patients` SET `fullName`= '$patientName',`phoneNumber`= '$phoneNumber',`emailAddress`= '$emailAddress',`emergencyPhone`='$emergencyContact',`addressLine1`= '$addressLine1',`cityID`='$cityID',`stateID`= '$stateID',`countryID`= '$countryID',`username`= '$emailAddress',`password`= '$phoneNumber',`previousMedication`= '$previousMed',`previousDiseases`= '$previousDiseases',`familyHistory`= '$familyHistory',`allergicReactions`= '$allergies',`foodHabits`= '$foodHabits',`lastLogin`= CURRENT_TIMESTAMP() WHERE `id`='$patientID'");
    echo $patientID;
  } else {
    $patientID = doThis("INSERT INTO `patients`(`fullName`, `phoneNumber`, `emailAddress`,`emergencyPhone`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `previousMedication`, `previousDiseases`, `familyHistory`, `allergicReactions`, `foodHabits`, `createdAt`)
     VALUES ('$patientName','$phoneNumber','$emailAddress','$emergencyContact','$addressLine1','$cityID','$stateID','$countryID','$emailAddress','$phoneNumber','$previousMed','$previousDiseases','$familyHistory','$allergies','$foodHabits',CURRENT_TIMESTAMP() )");
  }

  $ipdID = doThis("INSERT INTO `ipdlog`(`patientId`, `hospitalId`,`bedId`, `roomID`, `entryTime`)
   VALUES ('$patientID','$hospitalID','$bed','$roomID',CURRENT_TIMESTAMP())");

  $res = doThis("UPDATE `beds` SET `currIpdId` = '$ipdID' WHERE `id`='$bed'");
?>
  <script>
    alert("Patient Registered Successfully!!");
    window.location = "../dashboard.php";
  </script>
<?php
}
?>