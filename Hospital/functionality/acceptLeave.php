<?php
include "../../assets/fxn.php";
$id = $_GET['id'];
$id = e_d('d', $id);

$res = doThis("UPDATE `doctorLeaves` SET `enabled`='1' WHERE `id` = '$id'");
if ($res) {
?>
    <script>
        alert("Leave Accepted!!");
        window.location = "../leaveApplications.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Some Technical Error!!");
        window.location = "../leaveApplications.php";
    </script>
<?php
}
?>
