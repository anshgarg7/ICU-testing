<?php
include "../../assets/fxn.php";
$id = $_SESSION["UID"];
$ipdId = e_d('d', $_GET['id']);
$patientToken = substr(e_d('e', $id . "-/#" . time() . "-/#" . rand(0, 99999)), 0, 6);

$temp_res = doThis("UPDATE `ipdappointment` SET `ipdToken` = '$patientToken', `enabled` = '1' WHERE `id` = '$ipdId'");
$res = doThis("UPDATE `patients` SET `ipdToken` = '$patientToken' WHERE `id` = '$id' ");

if ($res and $temp_res) {
?>
    <script>
        alert("Token Generated !!");
        window.location = "../viewIpdToken.php";
    </script>
<?php
}
?>
