<?php 
include "dash_common.php";

$reports = getThis("SELECT `id`,`patientID`, `sampleName`, `testName`, `reportLink` FROM `labreports` WHERE `laboratoryID` = '$id' AND `reportUploaded` = '1' AND `enabled` = '-1'");
?>
<div class="app-main__outer">
                        <div class="app-main__inner">
                        <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Samples Collected By the Laboratory</h5>
            <table class="mb-0 table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Sample Name</th>
                    <th>Test Name</th>
                    <th>Action</th>
                </tr>
                </thead> 
                <tbody>
                <?php
                for($i=0;$i<sizeof($reports);$i++)
                {
                    ?>
                    <tr>
                    <td>
                    <?php echo $i+1; ?> 
                    </td>
                    <td>
                    <?php  $temp_pid = $reports[$i]['patientID'];
                        $patient_name = getThis("SELECT `fullName` FROM `patients` WHERE `id` = '$temp_pid'");
                        $patient_name = $patient_name[0]['fullName'];
                        $patient_name = e_d('d',$patient_name);
                        echo $patient_name;
                    ?> 


                    </td>
                    <td>
                    <?php $sampleName = e_d('d',$reports[$i]['sampleName']);
                        $sampleName = unserialize($sampleName);
                        for($x=0;$x<sizeof($sampleName);$x++)
                        {
                            echo $sampleName[$x]."<br>";
                        }
                    ?> 
                    </td>
                    <td>
                    <?php echo e_d('d',$reports[$i]['testName']); ?> 
                    </td>
                    <td>
                        <a href="uploadReview.php?id=<?php echo e_d('e',$reports[$i]['id']); ?>" class= "btn btn-primary">Review</a>
                    </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>