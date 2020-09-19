<?php
include "../../assets/fxn.php";


if (isset($_POST['submit'])) {
    $room = $_POST['room'];
    $bed = $_POST['bed'];
    $patientID = $_SESSION["patientId"];
    $ipdId = $_SESSION["ipdId"];
    $doctorId = getThis("SELECT `doctorId` FROM `ipdappointment` WHERE `id`= '$ipdId'");
    $doctorId = $doctorId[0]['doctorId'];
    $hospitalID = $_SESSION["UID"];
    // $temp_res = doThis("UPDATE `beds` set `enabled` = '1' WHERE `id` = '$bed'");
    $res = doThis("INSERT INTO `ipdlog`(`patientId`, `doctorId`, `hospitalId`,`bedId`, `entryTime`) VALUES ('$patientID','$doctorId','$hospitalID', '$bed' ,CURRENT_TIMESTAMP())");
    $temp_res = doThis("UPDATE `beds` set `enabled` = '1', `currIpdId` = '$res' WHERE `id` = '$bed' ");
    if ($res and $temp_res) {
?>
        <script>
            alert("Patient Admitted!!");
            window.location = "../ipdportal.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Some Technical Error!!");
            window.location = "../dashboard.php";
        </script>
<?php
    }
}
?>
