<?php
include "../assets/fxn.php";
$token = $_SESSION['token'];
doThis("UPDATE `doctoken` SET `lastLogoutAt`=CURRENT_TIMESTAMP() WHERE `token`='$token'");
// doThis("UPDATE `doctoken` SET `lastLogoutAt`=CURRENT_TIMESTAMP(),`enabled`='0' WHERE `token`='$token'");
$doctId = $_SESSION["UID"];
doThis("UPDATE `doctors` SET `currentActivity` = '0' WHERE `id` = '$doctId'");
session_destroy();
header("location:../index.php");
?>
