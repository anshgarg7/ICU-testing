<?php
include "../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
    <script type="text/javascript">
        window.location = 'logout.php';
    </script>
<?php
}
$id = $_SESSION["UID"];
$name = e_d('d', $_SESSION["fullName"]);
$email = e_d('d', $_SESSION["emailAddress"]);
$phone = e_d('d', $_SESSION["phoneNumber"]);
$departmentID = $_SESSION["departmentID"];
$qualificationID = $_SESSION["qualificationID"];
$hospitalID = $_SESSION["hospitalID"];
$pid = $_SESSION["patientIDforDoctor"];
$token = $_SESSION['patienttoken'];
$patientID = e_d('d', $_SESSION["patientIDforDoctor"]);
$details = getThis("SELECT  `fullName`, `phoneNumber`, `emailAddress`,`previousMedication`, `previousDiseases` FROM `patients` WHERE `id` = '$patientID'");
$details = $details[0];
$selectedData = getThis("SELECT `prescriptionView`, `laboratoryReportsView` FROM `patienttoken` WHERE `token`='$token'");
$selectedData = $selectedData[0];
$prescriptionSelected = e_d('d', $selectedData['prescriptionView']);
$prescriptionSelected = unserialize($prescriptionSelected);
$reportsSelected = e_d('d', $selectedData['laboratoryReportsView']);
$reportsSelected = unserialize($reportsSelected);
$previousprescriptions = getThis("SELECT `id`,`symptoms`,`medicinePrescribed`, `generatedAt`, `updatedAt` FROM `prescription` WHERE `patientID`='$patientID' AND `doctorID`='$id' ORDER BY `generatedAt` DESC");
$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalID'");
$hospital = $hospital[0];

include "patient_dash_common.php";
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div><?php echo $name; ?>'s Dashboard
                        <div class="page-title-subheading">Welcome to Your DashBoard!!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="functionality/newDate.php" method="post">
            <div class="col-md-12">
                <div class="position-relative form-group"><label for="exampleEmail11" class="">Reason Patient Needs to Be Admitted</label><input name="reason" placeholder="Reason Patient Need to be Admitted" type="text" class="form-control"></div>
            </div>
            <div class="col-md-12">
                <div class="position-relative form-group"><label for="exampleEmail11" class="">Procedure To Be Followed</label><input name="procedure" placeholder="Procedure to be Followed" type="text" class="form-control"></div>
            </div>
            <div class="col-md-12">
                <div class="position-relative form-group"><label for="exampleEmail11" class="">Remarks (if Any) </label><input name="remarks" placeholder="Reamrks (if Any)" type="text" class="form-control"></div>
            </div>
            <div class="col-md-12">
                <div class="position-relative form-group"><label for="exampleEmail11" class="">Date Recommended</label><input name="date" type="date" class="form-control"></div>
            </div>
            <div class="col-md-12">
                <div class="position-relative form-group"><label for="exampleEmail11" class="">Room Type Recommended</label><input name="room" placeholder="So basically here i plan to put a dropdown of all available room types" type="text" class="form-control"></div>

            </div>
            <br>
            <button type="submit" name="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Submit</button>
            <br>

        </form>
        <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" onclick="window.open('otBook.php')">Schedule Surgery</button>

    </div>
</div>
