<?php
include "../../assets/fxn.php";
$id = $_GET['id'];
$id = e_d('d', $id);
$res = doThis("UPDATE `doctorLeaves` SET `enabled` = '2' WHERE `id` = '$id'");
if ($res) {
?>
    <script>
        alert("Leave Rejected!!");
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
