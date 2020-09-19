<?php
	include "../../assets/fxn.php";
	$user = e_d('e',$_POST["username"]);
	$pass = e_d('e',$_POST["password"]);
	//$temp_login = $con->query("SELECT doctors.`id` AS id,doctoken.`id` AS tid,`hospitalID`,`qualificationID`,`departmentID`, `fullName`, `phoneNumber`, `emailAddress` FROM `doctors`,`doctoken` WHERE `username`='$user' OR `email`='$user'  AND `password`='$pass' AND doctors.`enabled`=1 AND doctoken.`enabled` = 1 AND doctoken.`token` = '$token' AND doctors.`tokenID` = doctoken.`id` AND doctors.`id` = doctoken.`doctorID`");
	$temp_login = $con->query("SELECT `id`, `hospitalName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username` FROM `hospitals` WHERE `username`='$user' AND `password`='$pass' AND `enabled`=1");
	$login=$temp_login->fetch_assoc();
	if ($login["id"]!=null) {
		$id = $login["id"];
		//$tid = $login["tid"];
		$_SESSION["UID"]=$login["id"];
		$_SESSION["hospitalName"]=$login["hospitalName"];
		$_SESSION["emailAddress"]=$login["emailAddress"];
		$_SESSION["phoneNumber"]=$login["phoneNumber"];
		$_SESSION["username"]=$login["username"];

		doThis("UPDATE `hospitals` SET `lastLogin`=CURRENT_TIMESTAMP() WHERE `id` = '$id'");
		//doThis("UPDATE `doctoken` SET `lastLoginAt`=CURRENT_TIMESTAMP() WHERE `id` = '$tid'");
		?>
    <script type="text/javascript">
      window.location='../index.php';
    </script>
    <?php
	}else{
		?>
		<script type="text/javascript">
			alert("Login Failed ! Please try again !!");
      window.location='../index.php';
		</script>
		<?php
	}
?>
