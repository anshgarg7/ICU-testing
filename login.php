<?php
	include "assets/fxn.php";
	$user = e_d('e',$_POST["User"]);
	$pass = md5($_POST["Pass"]);
	$temp_login = $con->query("SELECT users.`id` as `id`, `fullName`, `phoneNumber`, `emailAddress`, `dob`, `profilePhoto`, `password`, `enabled`, p.`id` AS `pid`, p.`userID`, p.`superAdmin`,p.`registerNewUser`, p.`uploadContent`, p.`News`, p.`Blog` FROM `users`,`userpermissions` AS p WHERE `phoneNumber`='$user' AND `password`='$pass' AND `enabled`=1 AND users.`id` = `userID`");
	$login=$temp_login->fetch_assoc();
	if ($login["id"]!=null) {
		$id = $login["id"];
		$_SESSION["UID"]=$login["id"];
		$_SESSION["fullName"]=e_d('d',$login["fullName"]);
		$_SESSION["emailAddress"]=$login["emailAddress"];
		$_SESSION["phoneNumber"]=$login["phoneNumber"];
		$_SESSION["dob"]=$login["dob"];
		$_SESSION["profilePhoto"]=$login["profilePhoto"];
		$_SESSION["superAdmin"]=$login["superAdmin"];
		$_SESSION["registerNewUser"]=$login["registerNewUser"];
		$_SESSION["uploadContent"]=$login["uploadContent"];
		$_SESSION["News"]=$login["News"];
		$_SESSION["Blog"]=$login["Blog"];
		doThis("UPDATE `users` SET `lastUsed`=CURRENT_TIMESTAMP() WHERE `id` = '$id'");
		?>
    <script type="text/javascript">
      window.location='index.php';
    </script>
    <?php
	}else{
		?>
		<script type="text/javascript">
			alert("Login Failed ! Please try again !!");
      window.location='index.php';
		</script>
		<?php
	}
?>s
