<?php
include "../assets/fxn.php";
$token = $_SESSION['token'];
doThis("UPDATE `doctoken` SET `lastLogoutAt`=CURRENT_TIMESTAMP(),`enabled`='0' WHERE `token`='$token'");
session_destroy();
header("location:index.php");
?>
