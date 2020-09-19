<?php
include "../../assets/fxn.php";
$_SESSION['department'] = $_POST["department"];
$_SESSION['doctor'] = $_POST["doctor"];
?>
			<script type="text/javascript">
        alert("On-Duty Doctor Set");
        window.location = '../index.php';
			</script>
