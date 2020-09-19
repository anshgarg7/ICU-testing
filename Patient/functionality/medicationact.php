<?php
include "../../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
	?>
	<script type="text/javascript">
		window.location='../logout.php';
	</script>
	<?php
}
$id = $_SESSION["UID"];
$name = e_d('d',$_SESSION["fullName"]);
$email = e_d('$d',$_SESSION["emailAddress"]);
$phone = e_d('d',$_SESSION["phoneNumber"]);
$previousdata = getThis("SELECT `previousMedication`, `previousDiseases` FROM `patients` WHERE `id` = '$id'");
$previousdata = $previousdata[0];
$previousmed = e_d('d',$previousdata['previousMedication']);
$previousmed = unserialize($previousmed);
$previousdiseases = e_d('d',$previousdata['previousDiseases']);
$previousdiseases = unserialize($previousdiseases);

if(isset($_POST['submit']))
{
		if(strlen(trim($_POST['diseases'][0]))!=0 && (!empty($previousdiseases))){
			$disease = $_POST['diseases'];
			$disease = array_merge($previousdiseases,$disease);
			$disease = serialize($disease);
			$disease = e_d('e',$disease);
			$res = doThis("UPDATE `patients` SET `previousDiseases`= '$disease' WHERE `id` = '$id' ");
		}elseif(strlen(trim($_POST['diseases'][0]))!=0 && (empty($previousdiseases))){
			$disease = $_POST['diseases'];
			$disease = serialize($disease);
			$disease = e_d('e',$disease);
			$res = doThis("UPDATE `patients` SET `previousDiseases`= '$disease' WHERE `id` = '$id' ");
		}
		if(strlen(trim($_POST['medicine'][0]))!=0 && (!empty($previousmed))){
			$medicine = $_POST['medicine'];
			$medicine = array_merge($previousmed,$medicine);
			$medicine = serialize($medicine);
			$medicine = e_d('e',$medicine);
			$res = doThis("UPDATE `patients` SET `previousMedication`= '$medicine' WHERE `id` = '$id' ");
		}elseif(strlen(trim($_POST['medicine'][0]))!=0 && (empty($previousmed))){
			$medicine = $_POST['medicine'];
			$medicine = serialize($medicine);
			$medicine = e_d('e',$medicine);
			$res = doThis("UPDATE `patients` SET `previousMedication`= '$medicine' WHERE `id` = '$id' ");
		}

    ?>
    <script>
        window.location = "../previous_medication.php";
</script>
<?php
}
?>
