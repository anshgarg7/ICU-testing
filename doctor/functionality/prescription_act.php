<?php
include "../../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
  <script type="text/javascript">
    window.location = 'logout.php';
  </script>
<?php
}
$ipdID = $_POST["ipdID"];
$symptomsdata = $_POST['symptoms'];
$symptomsdata = serialize($symptomsdata);
$symptomsdata = e_d('e', $symptomsdata);
$meddata = $_POST['med'];
$meddata = serialize($meddata);
$meddata = e_d('e', $meddata);
$instructdata = $_POST['instruct'];
$instructdata = serialize($instructdata);
$instructdata = e_d('e', $instructdata);
$dosedata = $_POST['dose'];
$dosedata = serialize($dosedata);
$dosedata = e_d('e', $dosedata);
$findingsdata = $_POST['findings'];
$findingsdata = serialize($findingsdata);
$findingsdata = e_d('e', $findingsdata);
$diagnosisdata = $_POST['diagnosis'];
$diagnosisdata = serialize($diagnosisdata);
$diagnosisdata = e_d('e', $diagnosisdata);
$labtestsdata = $_POST['labtests'];
$labtestsdata = serialize($labtestsdata);
$labtestsdata = e_d('e', $labtestsdata);
$dietadvice = e_d('e', $_POST['diet']);
$specialadvice = e_d('e', $_POST['special']);

if (isset($_POST['submit'])) {
  $prescriptionID = doThis("INSERT INTO `prescription`(`ipdID`,`symptoms`, `dietAdvice`, `specialAdvice`,`doctorFindings`,`doctorDiagnosis`,`labTestAdvice` ,`medicinePrescribed`, `medicineDosage`, `medicineInstructions`, `generatedAt`) VALUES ('$ipdID','$symptomsdata','$dietadvice','$specialadvice','$findingsdata','$diagnosisdata','$labtestsdata','$meddata','$dosedata','$instructdata', CURRENT_TIMESTAMP())");

  // $prescriptionID = doThis("INSERT INTO `prescription`(`hospitalID`, `doctorID`, `patientID`, `symptoms`, `dietAdvice`, `specialAdvice`,`doctorFindings`,`doctorDiagnosis`,`patientVitals`,`labTestAdvice` ,`medicinePrescribed`, `medicineDosage`, `medicineInstructions`) VALUES ('$hospitalID','$doctorID','$patientID','$symptomsdata','$dietadvice','$specialadvice','$findingsdata','$diagnosisdata','$vitalsdata','$labtestsdata','$meddata','$dosedata','$instructdata')");

?>
  <script>
    alert("Prescription Registered Successfully!!");
    window.location = "../dashboard.php";
  </script>
<?php
}
?>