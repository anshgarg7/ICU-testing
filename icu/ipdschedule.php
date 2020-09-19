<?php
include "dash_common.php";
?>
<?php
// include "assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
    <script type="text/javascript">
        window.location = 'logout.php';
    </script>
<?php
}
$id = $_SESSION["UID"];
$name = e_d('d', $_SESSION["fullName"]);
$email = e_d('$d', $_SESSION["emailAddress"]);
$phone = e_d('d', $_SESSION["phoneNumber"]);
$departmentID = $_SESSION["departmentID"];
$qualificationID = $_SESSION["qualificationID"];
$hospitalID = $_SESSION["hospitalID"];

$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalID'");
$hospital = $hospital[0];
$change = getThis("SELECT `id`, `patientId`, `remarks`, `admissionDate`, `generatedAt` FROM `ipdappointment` WHERE `enabled` = 2 AND `doctorId` = '$id' AND `hospitalId` = '$hospitalID'");
?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card" style="overflow-x:scroll;">
            <div class="card-body">
                <h5 class="card-title">IPD Date Change Requests</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient Name</th>
                            <th>Remarks</th>
                            <th>Appointment Time</th>
                            <th>Requested On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < sizeof($change); $i++) {
                            $temp = $change[$i];
                        ?>
                            <tr>
                                <th>
                                    <?php echo ($i + 1); ?>
                                </th>
                                <td>
                                    <?php $temp_pid = $temp['patientId'];
                                    $temp_patient = getThis("SELECT `fullName` from `patients` where `id` = '$temp_pid'");
                                    echo e_d('d', $temp_patient[0]['fullName']);
                                    ?>
                                </td>
                                <td>
                                    <?php echo e_d('d', $temp['remarks']); ?>
                                </td>
                                <td>
                                    <?php echo substr($temp['admissionDate'], 0, 10); ?>
                                </td>
                                <td>
                                    <?php echo substr($temp['generatedAt'], 0, 10); ?>
                                </td>
                                <td>
                                    <a href="functionality/acceptDate.php?id= <?php echo e_d('e', $temp['id']); ?>" class="btn btn-primary">Accept Change</a>
                                    <a href="discardDate.php?id=<?php echo e_d('e', $temp['id']); ?> " class="btn btn-primary">Suggest New</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>