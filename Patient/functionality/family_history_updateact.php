<?php
include "../../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
 	?>
 	<script type="text/javascript">
 		window.location='logout.php';
 	</script>
	<?php
}
$patientID = $_POST['patientID'];
$familyHistory = e_d('e',$_POST['familyHistory']);


 if(isset($_POST['submit']))
 {
     doThis("UPDATE `patients` SET `familyHistory`='$familyHistory' WHERE `id` = '$patientID' ");
     ?>
     <script>
         alert("Family History Updated Successfully!!");
         window.location = "../personal_details.php";
 </script>
<?php
 }
?>
