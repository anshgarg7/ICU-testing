<?php
	include "../../assets/fxn.php";
	$user = e_d('e',$_POST["username"]);
    $pass = e_d('e',$_POST["password"]);

    $temp_login = $con->query("SELECT `id`, `fullName`, `phoneNumber`, `emailAddress` FROM `patients` WHERE `username`='$user'   AND `password`='$pass' AND `enabled`=1");
    $login=$temp_login->fetch_assoc();

    if($login["id"]!=NULL)
    {
        $id = $login["id"];
		$_SESSION["UID"]=$login["id"];
		$_SESSION["fullName"]=$login["fullName"];
		$_SESSION["emailAddress"]=$login["emailAddress"];
		$_SESSION["phoneNumber"]=$login["phoneNumber"];
        doThis("UPDATE `patients` SET `lastLogin`=CURRENT_TIMESTAMP() WHERE id=$id");
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
