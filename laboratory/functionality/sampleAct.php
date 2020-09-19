<?php
include "../../assets/fxn.php";
$laboratoryId = $_SESSION["UID"];
if(isset($_POST['submit']))
{
    $patientId = $_POST['patientId'];
    $prescriptionId = $_POST['prescriptionId'];
    $typeoftest = $_POST['typeoftest'];
    $sampleName = $_POST['sampleName'];
    $sampleName = serialize($sampleName);
    $sampleName = e_d('e',$sampleName);
    $sampleType = $_POST['sampleType'];
    $sampleType = serialize($sampleType);
    $sampleType = e_d('e',$sampleType);
    $sampleRemarks = $_POST['sampleRemarks'];
    $sampleRemarks = serialize($sampleRemarks);
    $sampleRemarks = e_d('e',$sampleRemarks);
    if($typeoftest == 'self'){
      $testName = e_d('e',$_POST['testName']);
      $res = doThis("INSERT INTO `labreports`( `prescriptionID`, `laboratoryID`, `patientID`, `sampleName`, `sampleType`, `sampleRemarks`, `sampleTakenAt`, `testName`) VALUES ('$prescriptionId','$laboratoryId','$patientId','$sampleName','$sampleType','$sampleRemarks',CURRENT_TIMESTAMP(), '$testName')");
    }
    else {
      $res = doThis("INSERT INTO `labreports`( `prescriptionID`, `laboratoryID`, `patientID`, `sampleName`, `sampleType`, `sampleRemarks`, `sampleTakenAt`) VALUES ('$prescriptionId','$laboratoryId','$patientId','$sampleName','$sampleType','$sampleRemarks',CURRENT_TIMESTAMP())");
    }
    if($res)
    {
        ?>
        <script>
        alert("Sample Registered!!");
        window.location = "../uploadReport.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("There is some technical error!!");
            window.location = "../dashboard.php";
        </script>
        <?php
    }
}
?>
