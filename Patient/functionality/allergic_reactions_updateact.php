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
$allergicReactions = $_POST['allergicReactions'];
$allergicReactions = serialize($allergicReactions);
$allergicReactions = e_d('e',$allergicReactions);


 if(isset($_POST['submit']))
 {
     doThis("UPDATE `patients` SET `allergicReactions`='$allergicReactions' WHERE `id` = '$patientID' ");
     ?>
      <script>
         alert("Allergic Reactions Updated Successfully!!");
         window.location = "../personal_details.php";
 </script>
<?php
 }
?>
