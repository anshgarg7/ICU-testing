<?php
	include "../../assets/fxn.php";
	$user = e_d('e',$_POST["username"]);
	$pass = e_d('e',$_POST["password"]);
	$login = getThis("SELECT `id` AS id, `laboratoryName`, `phoneNumber`, `emailAddress`,`hospitalId` FROM `laboratories` WHERE `username`='$user' AND `password`='$pass' AND `enabled`=1");
	//$temp_login = $con->query("SELECT doctors.`id` AS id,`hospitalID`,`qualificationID`,`departmentID`, `fullName`, `phoneNumber`, `emailAddress` FROM `doctors` WHERE `username`='$user'   AND `password`='$pass' AND doctors.`enabled`=1");
	if($login){
		$login = $login[0];

	if ($login["id"]!=null) {
		$id = $login["id"];
		$_SESSION["UID"]=$login["id"];
		$_SESSION["fullName"]=$login["laboratoryName"];
		$_SESSION["emailAddress"]=$login["emailAddress"];
		$_SESSION["phoneNumber"]=$login["phoneNumber"];
		$_SESSION["hospitalId"] = $login["hospitalId"];

		doThis("UPDATE `laboratories` SET `lastLogin`=CURRENT_TIMESTAMP() WHERE `id` = '$id'");
		?>
    <script type="text/javascript">
      window.location='../index.php';
    </script>
    <?php
	}}else{
		?>
		<script type="text/javascript">
			alert("Login Failed ! Please try again !!");
      window.location='../index.php';
		</script>
		<?php
	}
?>
