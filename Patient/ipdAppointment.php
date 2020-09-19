<?php

include "dash_common.php";
$ipd = getThis("SELECT `id`, `doctorId`, `hospitalId`, `remarks`, `admissionDate`, `generatedAt` FROM `ipdappointment` WHERE `enabled` = '0' AND `patientId` = '$id'");
if (sizeof($ipd) > 0) {
    $ipd = $ipd[0];
?>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">

                        <div>IPD Recommendations
                            <div class="page-title-subheading">Date of Admission Recommended By Your Doctor
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="main-card mb-3 card" style="overflow-x:scroll;">
                    <div class="card-body">
                        <h5 class="card-title">IPD Record</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Hospital Name</th>
                                    <th>Recommended Date</th>
                                    <th>Remarks</th>
                                    <th>Consulted On</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php $temp_did = $ipd['doctorId'];
                                        $doc = getThis("SELECT `fullName` from `doctors` where `id` = '$temp_did' ");
                                        $doc = e_d('d', $doc[0]['fullName']);
                                        echo $doc; ?> </td>
                                    <td>
                                        <?php $temp_hid = $ipd['hospitalId'];
                                        $hosp = getThis("SELECT `hospitalName` from `hospitals` WHERE `id` = '$temp_hid' ");
                                        echo e_d('d', $hosp[0]['hospitalName']); ?>
                                    </td>
                                    <td>
                                        <?php echo substr($ipd['admissionDate'], 0, 10); ?>
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $ipd['remarks']); ?>
                                    </td>
                                    <td>
                                        <?php echo substr($ipd['generatedAt'], 0, 10); ?>
                                    </td>
                                    <td>
                                        <a href="functionality/generateToken.php?id= <?php echo e_d('e', $ipd['id']); ?>" class="btn btn-primary">Accept Date</a>
                                        <a href="ipdNewDate.php?id= <?php echo e_d('e', $ipd['id']); ?> " class="btn btn-primary">Change Date</a>
                                        <a href="functionality/cancelIpd.php?id= <?php echo e_d('e', $ipd['id']); ?>" class="btn btn-primary">Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <?php } else {
            $newDate = getThis("SELECT `id`, `doctorId`, `hospitalId`, `remarks`, `admissionDate`, `generatedAt` FROM `ipdappointment` WHERE `enabled` = '1' AND `patientId` = '$id'");
            if (sizeof($newDate) > 0) {

            ?>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <h2>The Hospital Admission Details</h2>
                        <table>
                            <tr>
                                <td>
                                    <h3>Doctor Name : </h3>
                                </td>
                                <td>
                                    <h3>
                                        <?php $temp_did = $newDate[0]['doctorId'];
                                        $doc = getThis("SELECT `fullName` from `doctors` where `id` = '$temp_did' ");
                                        $doc = e_d('d', $doc[0]['fullName']);
                                        echo $doc; ?>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Hospital Name : </h3>
                                </td>
                                <td>
                                    <h3>
                                        <?php $temp_hid = $newDate[0]['hospitalId'];
                                        $hosp = getThis("SELECT `hospitalName` from `hospitals` WHERE `id` = '$temp_hid' ");
                                        echo e_d('d', $hosp[0]['hospitalName']); ?>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Date Of Admission : </h3>
                                </td>
                                <td>
                                    <h3>
                                        <?php echo substr($newDate[0]['admissionDate'], 0, 10); ?>
                                    </h3>
                                </td>
                            </tr>

                        </table>
                        <br>
                        <br>
                        <a href="functionality/generateToken.php?id= <?php echo e_d('e', $newDate[0]['id']); ?>" class="btn btn-primary btn-lg btn-block">Generate Token</a>
                        <a href="viewIpdToken.php" class="btn btn-primary btn-lg btn-block">View Token</a>
                        <a href="functionality/cancelIpd.php?id= <?php echo e_d('e', $newDate[0]['id']); ?>" class="btn btn-primary btn-lg btn-block">Cancel Admission</a>

                    <?php
                } else {
                    ?>
                        <div class="app-main__outer">
                            <div class="app-main__inner">
                                <div class="col-md-12 col-xl-12">
                                    <div class="card mb-3 widget-content bg-midnight-bloom">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">No IPD scheduled</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                } ?>