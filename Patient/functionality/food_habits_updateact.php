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
$foodHabits = $_POST['foodHabits'];
$foodHabits = serialize($foodHabits);
$foodHabits = e_d('e',$foodHabits);


 if(isset($_POST['submit']))
 {
     doThis("UPDATE `patients` SET `foodHabits`='$foodHabits' WHERE `id` = '$patientID' ");
     ?>
      <script>
         alert("Food Habits Updated Successfully!!");
         window.location = "../personal_details.php";
 </script>
<?php
 }
?>
