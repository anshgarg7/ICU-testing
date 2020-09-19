<?php
include "dash_common.php";
?>

<?php
$report = getThis("SELECT `id`, `prescriptionID`, `laboratoryID`, `testName`, `reportLink`, `testTime` FROM `labreports` WHERE `patientID` = $id AND `enabled` = '1'");

?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div>Total Reports
                        <div class="page-title-subheading">List of All Your Test Conducted
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Lab Reports</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo sizeof($report); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="main-card mb-3 card" style="overflow-x:scroll;">
                    <div class="card-body">
                        <h5 class="card-title">Test Reports</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Test Name</th>
                                    <th>Test Date & Time</th>
                                    <th>Lab Name</th>
                                    <th>Referred By</th>
                                    <th>View</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sizeofqueue = sizeof($report);
                                for ($i = 0; $i < $sizeofqueue; $i++) {
                                    $UL = $report[$i]; ?>
                                    <tr>
                                        <th style="width:2%;" scope="row">
                                            <?php echo $i + 1; ?>
                                        </th>
                                        <td style="width:10%;">
                                            <?php echo e_d('d', $UL['testName']); ?>
                                        </td>
                                        <td style="width:10%">
                                            <?php $date = date('<b>d M</b> Y <b>h.i.s A</b>', strtotime($UL['testTime'])); ?>
                                            <?php echo $date; ?>
                                        </td>
                                        <td style="width:10%;">
                                            <?php $labID =  $UL['laboratoryID'];

                                            $labName = getThis("SELECT `laboratoryName` from `laboratories` where `id` = '$labID'");
                                            $labName = $labName[0]['laboratoryName'];
                                            $labName = e_d('d', $labName);
                                            echo $labName;
                                            ?>
                                        </td>
                                        <td style="width:10%;">
                                            <?php $prescripId =  $UL['prescriptionID'];
                                            $doctor_name = 'Self';
                                            if ($prescripId != 0) {
                                                $doctorId = getThis("SELECT `doctorID` FROM `prescription` WHERE `id` = $prescripId");
                                                $doctorId =  $doctorId[0]['doctorID'];
                                                $temp_doctor = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = $doctorId");
                                                $doctor_name = $temp_doctor[0]['fullName'];
                                                $doctor_name = e_d('d', $doctor_name);
                                            }
                                            echo $doctor_name;
                                            ?>
                                        </td>
                                        <td style="width:10%;">
                                            <a href="report.php?rep=<?php echo e_d('e', $UL['id']); ?>">View Details</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- </div>
                    </div> -->
    </div>
</div>
</div>

</div>
</div>
</body>

</html>