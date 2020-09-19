<?php
include "../../assets/fxn.php";
$user = e_d('e', $_POST["username"]);
$pass = e_d('e', $_POST["password"]);
$login = getThis("SELECT `id`, `hospitalId`, `roomName`, `roomDescription`, `roomLocation`, `roomUsername`, `roomPassword`, `totalBeds`, `generatedAt`, `enabled` FROM `rooms` WHERE `roomUsername`='$user' AND `roomPassword`='$pass' AND `enabled`='1'");
if ($login) {
	$login = $login[0];
	if ($login["id"] != null) {
		$id = $login["id"];
		$_SESSION["UID"] = $login["id"];
		$_SESSION["hospitalId"] = $login["hospitalId"];
		$_SESSION["roomName"] = $login["roomName"];
		$_SESSION["roomDescription"] = $login["roomDescription"];
		$_SESSION["roomLocation"] = $login["roomLocation"];
		$_SESSION["totalBeds"] = $login["totalBeds"];
?>
		<script type="text/javascript">
			window.location = '../dashboard.php';
		</script>
	<?php
	}
} else {
	?>
	<script type="text/javascript">
		alert("Login Failed ! Please try again !!");
		window.location = '../../index.php';
	</script>
<?php
}
?>
