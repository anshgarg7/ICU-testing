<?php
include "dash_common.php";
?>

<?php
$reportID = $_GET['rep'];
$reportID = e_d('d',$reportID);
$report = getThis("SELECT `prescriptionID`, `laboratoryID`, `testName`, `reportLink`, `testTime` FROM `labreports` WHERE `id` = '$reportID' AND `enabled` = '1'");
$report = $report[0];
?>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                    <div class="main-card mb-3 card">
                                <div class="no-gutters row">
                                    <div class="col-md-4">
                                        <div class="pt-0 pb-0 card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Patient Name</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-primary"><?php echo $name; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Test Name</div>

                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-primary"><?php echo e_d('d',$report['testName']); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pt-0 pb-0 card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Reffered By</div>

                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-primary">
                                                                        <?php
                                                                        $prescriptionId = $report['prescriptionID'];
                                                                        $doctor_name = 'Self';
                                                                        if($prescriptionId != 0){
                                                                        $doctorId = getThis("select `doctorID` from `prescription` where `id` = '$prescriptionId' ");

                                                                        $doctorId = $doctorId[0]['doctorID'];
                                                                        $temp_doctor = getThis("SELECT `fullName` from `doctors` where `id` = '$doctorId'");
                                                                        $temp_doctor = $temp_doctor[0]['fullName'];
                                                                        $doctor_name = e_d('d',$temp_doctor);
                                                                        }
                                                                        echo $doctor_name;
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Conducted By</div>

                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-primary"><?php $labID =  $report['laboratoryID'];
                                                                     $labName = getThis("SELECT `laboratoryName` FROM `laboratories` WHERE `id` = '$labID'");
                                                                     $labName = $labName[0]['laboratoryName'];
                                                                     $labName = e_d('d',$labName);
                                                                     echo $labName;
                                                                     ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pt-0 pb-0 card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Conducted On</div>

                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-primary"><?php
                                                                    $date = $report['testTime'];
                                                                    echo substr($date,0,10); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Medicine Prescribed</div>
                                                                    <div class="widget-subheading">(In case, refferred by Doctor)</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-primary"><?php
                                                                     $prescriptionId = $report['prescriptionID'];
                                                                     $prescribed = 'No';
                                                                     if($prescriptionId !=0)
                                                                     {
                                                                         $enable = getThis("SELECT `patientID` from `prescription` where `id` = '$prescriptionId'");

                                                                         if(isset($enable)!=NULL)
                                                                         {
                                                                             $prescribed = 'Yes';
                                                                         }
                                                                     }
                                                                     echo $prescribed;
                                                                    ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                        $link = $report['reportLink'];
                        $link = e_d('d',$link);
                        ?>
                            <iframe src="<?php echo $link; ?>"  width="1200" height="450" style="float:none"></iframe>
                    </div>
                </div>
        </div>
</div>
</body>
</html>
