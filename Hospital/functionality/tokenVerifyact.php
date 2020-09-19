<?php
include "../../assets/fxn.php";
if (isset($_POST['submit'])) {
    $token = $_POST['token'];
    $ipd = getThis("SELECT `id` FROM `ipdappointment` WHERE `ipdToken` = '$token' AND `enabled` = '1' ");
    $patient = getThis("SELECT `id` FROM `patients` WHERE `enabled` = '1' AND `ipdToken` = '$token' ");
    if (sizeof($ipd) > 0 and sizeof($patient) > 0) {
        $_SESSION["ipdId"] = $ipd[0]['id'];
        $_SESSION["patientId"] = $patient[0]['id'];
?>
        <script>
            alert("Patient Verified!!");
            window.location = "../admit_patient.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Invalid Token!!");
            window.location = "../verifyPatient.php";
        </script>
<?php
    }
}
?>
