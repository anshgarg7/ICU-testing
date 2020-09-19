<?php

include "../../assets/fxn.php";
if (isset($_POST['submit'])) {
    $ipdId = $_POST['ipdId'];
    $date = $_POST['recommendedDate'];
    $remarks = $_POST['remarks'];
    $remarks = e_d('e', $remarks);
    $details = getThis("SELECT `patientId`,`doctorId`, `hospitalId`,`reason`,`procedureToFollow` FROM `ipdappointment` WHERE `id` = '$ipdId' ");
    $temp = doThis("UPDATE `ipdappointment` set `enabled` = '-1' where `id` = '$ipdId'");
    $doctorId = $details[0]['doctorId'];
    $hospitalId = $details[0]['hospitalId'];
    $patientId = $details[0]['patientId'];
    $reason = $details[0]['reason'];
    $procedure = $details[0]['procedureToFollow'];
    $res = doThis("INSERT INTO `ipdappointment`(`patientId`, `doctorId`, `hospitalId`, `remarks`,`reason`,`procedureToFollow`, `admissionDate`, `generatedAt`,`enabled`) VALUES('$patientId','$doctorId','$hospitalId','$remarks','$date',CURRENT_TIMESTAMP(),'2')");
    if ($res) {
?>
        <script>
            alert("Date Change Request Sent To The Concerned Doctor !!");
            window.location = "../dashboard.php";
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
