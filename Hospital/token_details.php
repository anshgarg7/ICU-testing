<?php
include "dash_common.php"; ?>

<?php
$token = $_GET['token'];
$token = e_d('d', $token);
$result = getThis("SELECT `doctorID`, `generatedAt` FROM `doctoken` WHERE `token` = '$token'");
$result = $result[0];
?>

<div class="app-main__outer">
    <div class="app-main__inner">

        <!-- work here -->
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
                                                <div class="widget-heading">Doctor Name</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary"><?php
                                                                                            $doctID = $result['doctorID'];
                                                                                            $doctor = getThis("SELECT `fullName`,`departmentID` FROM `doctors` WHERE `id` = '$doctID'");
                                                                                            $doctor = $doctor[0];
                                                                                            $doctorName = e_d('d', $doctor['fullName']);
                                                                                            echo $doctorName;
                                                                                            ?></div>
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
                                                <div class="widget-heading">Department Name</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary"><?php
                                                                                            $temp_id = $doctor['departmentID'];
                                                                                            $dept = getThis("SELECT  `departmentName` FROM `departments` WHERE `id` = '$temp_id' ");
                                                                                            echo $dept[0]['departmentName'];
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
                                                <div class="widget-heading">Entry Token</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary"><?php echo $token; ?></div>
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
                                                <div class="widget-heading">Date</div>

                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary"><?php echo substr($result['generatedAt'], 0, 10); ?></div>
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
                                                <div class="widget-heading">Entry Time</div>

                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary"><?php echo substr($result['generatedAt'], 11, 15); ?></div>
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
                                                <div class="widget-heading">Hospital Name</div>

                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary"><?php echo $name; ?></div>
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

        <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" onclick="window.print()">Print Token </button>
        <a href="doctor_token.php" class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Generate New Token</a>
        <a href="view_doctor_token.php" class="mb-2 mr-2 btn btn-primary btn-lg btn-block">View Tokens</a>

    </div>
</div>
</body>

</html>