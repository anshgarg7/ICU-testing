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
$insuranceDetails = e_d('e',$_POST['insuranceDetails']);


 if(isset($_POST['submit']))
 {
     doThis("UPDATE `patients` SET `insuranceDetails`='$insuranceDetails' WHERE `id` = '$patientID' ");
     ?>
     <script>
         alert("Insurance Number Updated Successfully!!");
         window.location = "../personal_details.php";
 </script>
<?php
 }
?>
