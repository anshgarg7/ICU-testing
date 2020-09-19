<?php
include "../../assets/fxn.php";
$ipdID = e_d('d',$_GET['id']);

$result = doThis("UPDATE `ipdlog` SET `exitTime`=CURRENT_TIMESTAMP(),`enabled`='0' WHERE `id`='$ipdID'");

?>
			<script type="text/javascript">
        alert("Patient Checkout Successful!!");
        window.location = '../index.php';
			</script>
