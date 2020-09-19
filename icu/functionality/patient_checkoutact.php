<?php
include "../../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
 	?>
 	<script type="text/javascript">
 		window.location='logout.php';
 	</script>
	<?php
}
$pid = e_d('d',$_SESSION["patientIDforDoctor"]);
$token = $_SESSION["patienttoken"];

     doThis("UPDATE `patienttoken` SET `enabled`=0 , `attendedAt` = CURRENT_TIMESTAMP() WHERE `patientID` = '$pid' AND `token` = '$token'");

     ?>
     <script>
         alert("Patient Attended Successfully!!");
         window.location = "../queue.php";
 </script>
