<?php
include "assets/fxn.php";
if(isset($_SESSION["UID"])==null){
	?>
	<script type="text/javascript">
		window.location='logout.php';
	</script>
	<?php
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$photo = $_POST['photo'];
$dob = $_POST['dob'];
if(isset($_POST['superAdmin'])){
$superadmin = $_POST['superAdmin'];
}
$registeruser = $_POST['registeruser'];
$uploadcontent = $_POST['uploadcontent'];
$news = $_POST['news'];
$blog = $_POST['blog'];
$enabled = $_POST['enabled'];
$password = md5($_POST['password']);
$userid = doThis("INSERT INTO `users`(`fullName`, `phoneNumber`, `emailAddress`, `dob`, `profilePhoto`, `password`, `enabled`) VALUES ('$name','$phone','$email','$dob','$photo','$password','$enabled')");
if(isset($_POST['superAdmin'])){
doThis("INSERT INTO `userpermissions`(`userID`, `superAdmin`,`registerNewUser`, `uploadContent`, `News`, `Blog`) VALUES ('$userid','$superadmin','$registeruser','$uploadcontent','$news','$blog')");
}else {
	doThis("INSERT INTO `userpermissions`(`userID`,`registerNewUser`, `uploadContent`, `News`, `Blog`) VALUES ('$userid','$registeruser','$uploadcontent','$news','$blog')");
}
?>
<script type="text/javascript">
  alert("Registration Successful !!");
  window.location='registernewuser.php';
</script>
