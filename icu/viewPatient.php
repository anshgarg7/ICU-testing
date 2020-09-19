<?php include "dash_common.php";
$ipdId =  $_GET["id"];
$ipdId = e_d('d', $ipdId);
$result = getThis("SELECT ipdlog.`id`, ipdlog.`patientId`, ipdlog.`bedId`, ipdlog.`roomID`, ipdlog.`entryTime`, ipdlog.`enabled` as ipdenabled, patients.`id`, patients.`fullName`, patients.`phoneNumber`, patients.`emailAddress`, patients.`previousMedication`, patients.`previousDiseases`, patients.`familyHistory`, patients.`allergicReactions`, patients.`foodHabits`, patients.`enabled` FROM `ipdlog`,`patients` WHERE ipdlog.`id`='$ipdId' AND patients.`id`=ipdlog.`patientId`");
$result = $result[0];
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div><?php echo $roomName; ?> Room Dashboard
                        <div class="page-title-subheading"><?php echo $roomDescription; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <a class="mb-2 mr-2 btn btn-success btn-lg btn-block" href="previousprescriptions.php?id=<?php echo e_d('e', $ipdId); ?>">Prescription Records</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <a class="mb-2 mr-2 btn btn-success btn-lg btn-block" href="vitalsrecord.php?id=<?php echo e_d('e', $ipdId); ?>">Vitals Records</a>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <a class="mb-2 mr-2 btn btn-success btn-lg btn-block" href="newPrescription.php?id=<?php echo e_d('e', $ipdId); ?>">New Prescription</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="main-card mb-3 card" style="overflow-x:scroll;">
                    <div class="card-body">
                        <h5 class="card-title">Patient Details</h5>
                        <table class="mb-0 table table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        Patient Name
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $result['fullName']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Phone Number
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $result['phoneNumber']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email Address
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $result['emailAddress']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Emergency Contact
                                    </td>
                                    <td>
                                        test
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Allergies
                                    </td>
                                    <td>
                                        <?php
                                        $allergies = e_d('d', $result['allergicReactions']);
                                        $allergies = unserialize($allergies);
                                        for ($i = 0; $i < sizeof($allergies); $i++) {
                                            echo $allergies[$i];
                                            echo "</br>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Previous Medication
                                    </td>
                                    <td>
                                        <?php
                                        $previousMedication = e_d('d', $result['previousMedication']);
                                        $previousMedication = unserialize($previousMedication);
                                        for ($i = 0; $i < sizeof($previousMedication); $i++) {
                                            echo $previousMedication[$i];
                                            echo "</br>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Family History
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $result['familyHistory']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Previous Diseases
                                    </td>
                                    <td>
                                        <?php
                                        $previousDiseases = e_d('d', $result['previousDiseases']);
                                        $previousDiseases = unserialize($previousDiseases);
                                        for ($i = 0; $i < sizeof($previousDiseases); $i++) {
                                            echo $previousDiseases[$i];
                                            echo "</br>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php if ($result['ipdenabled'] != 0) {
            ?>
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <a class="mb-2 mr-2 btn btn-danger btn-lg btn-block" href="functionality/checkoutpatientact.php?id=<?php echo e_d('e', $ipdId); ?>">Checkout Patient</a>
                        </div>
                    </div>
                </div>
            <?php
            } ?>

        </div>
    </div>
</div>