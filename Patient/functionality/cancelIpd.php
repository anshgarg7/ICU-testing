<?php
include "../../assets/fxn.php";
$id = e_d('d', $_GET['id']);
$res = doThis("UPDATE `ipdappointment` SET `enabled` = '-1' where `id` = '$id'");
if ($res) {
?>
    <script>
        alert("Admission Cancelled!!");
        window.location = "../ipdAppointment.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Some Technical Error Occurred !!");
        window.location = "../ipdAppointment.php";
    </script>
<?php
}

?>
