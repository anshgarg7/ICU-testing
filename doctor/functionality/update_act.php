<?php
include "../../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
 	?>
 	<script type="text/javascript">
 		window.location='logout.php';
 	</script>
	<?php
}
$hospitalID = $_POST['hospitalID'];
$doctorID = $_POST['doctorID'];
$patientID = $_POST['patientID'];
$prescriptid = $_SESSION['prescriptionID'];
$symptomsdata = $_POST['symptoms'];
$symptomsdata = serialize($symptomsdata);
$symptomsdata = e_d('e',$symptomsdata);
$meddata = $_POST['med'];
$meddata = serialize($meddata);
$meddata = e_d('e',$meddata);
$instructdata = $_POST['instruct'];
$instructdata = serialize($instructdata);
$instructdata = e_d('e',$instructdata);
$dosedata = $_POST['dose'];
$dosedata = serialize($dosedata);
$dosedata = e_d('e',$dosedata);
$findingsdata = $_POST['findings'];
$findingsdata = serialize($findingsdata);
$findingsdata = e_d('e',$findingsdata);
$diagnosisdata = $_POST['diagnosis'];
$diagnosisdata = serialize($diagnosisdata);
$diagnosisdata = e_d('e',$diagnosisdata);
$vitalsdata = $_POST['vitals'];
$vitalsdata = serialize($vitalsdata);
$vitalsdata = e_d('e',$vitalsdata);
$labtestsdata = $_POST['labtests'];
$labtestsdata = serialize($labtestsdata);
$labtestsdata = e_d('e',$labtestsdata);
$days = $_POST['days'];

$dietadvice = e_d('e',$_POST['diet']);
$specialadvice = e_d('e',$_POST['special']);

 if(isset($_POST['submit']))
 {
      doThis("INSERT INTO `prescription`(`hospitalID`, `doctorID`, `patientID`, `symptoms`, `dietAdvice`, `specialAdvice`,`doctorFindings`,`doctorDiagnosis`,`patientVitals`,`labTestAdvice` ,`medicinePrescribed`, `medicineDosage`, `medicineInstructions`,`days`) VALUES ('$hospitalID','$doctorID','$patientID','$symptomsdata','$dietadvice','$specialadvice','$findingsdata','$diagnosisdata','$vitalsdata','$labtestsdata','$meddata','$dosedata','$instructdata','$days')");
     doThis("UPDATE `prescription` SET `updatedAt`= CURRENT_TIMESTAMP WHERE `id` = '$prescriptid' ");

     ?>
     <script>
         alert("Prescription Updated Successfully!!");
         window.location = "../newprescription.php";
 </script>
<?php
 }
?>
