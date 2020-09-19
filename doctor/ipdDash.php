<?php
include "../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
    <script type="text/javascript">
        window.location = 'index.php';
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

$hospital = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id`='$hospitalID'");
$hospital = $hospital[0];

?>

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Doctor Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="assets/main.css" rel="stylesheet">
</head>
<script type="text/javascript" src="assets/scripts/main.js"></script>

<body onload="StartTimers();" onmousemove="ResetTimers();">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm mobile-toggle-header-nav" onclick="window.location='logout.php'">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">

                                        <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">

                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php echo $name; ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php echo e_d('d', $hospital['hospitalName']); ?>
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm mobile-toggle-header-nav" onclick="window.location='logout.php'">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboard</li>
                            <li>
                                <a href="dashboard.php" class="mm-active">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Doctor's Dashboard
                                </a>
                            </li>
                            <!-- <li class="app-sidebar__heading">Options</li>
                            <li>
                                <a href="queue.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Appointment Schedule
                                </a>
                                <a href="ipdschedule.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    IPD Date Changes
                                </a>
                                <a href="attendance.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    My Attendance
                                </a>
                                <a href="leave_apply.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Apply For Leave
                                </a>
                                <a href="leave_status.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Check Leave Status
                                </a>
                                <a href="discussion.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Discussion Panel
                                </a>
                            </li>
                    </div>
                </div> -->
                    </div>
                </div>

            </div>
            <?php
            $today = date('Y-m-d ');
            $today = date('Y-m-d ', strtotime($today . '+1 day'));

            // $today = date('Y-m-d', $today);
            $round = getThis("SELECT `id`,`roomID` FROM `ipdrounds` WHERE `doctorID` = '$id' AND `enabled` = '1' AND `roundDate` < '$today'");
            $roomId = $round[0]['roomID'];
            $roundId = $round[0]['id'];
            $beds = getThis("SELECT `bedNumber`, `currIpdId` FROM `beds` WHERE `roomId` = '$roomId' AND `hospitalId` = '$hospitalID'");
            ?>

            <!-- inner part -->
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">

                                <div><?php echo $name; ?>'s Dashboard
                                    <div class="page-title-subheading">Welcome to Your DashBoard Doctor!!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-card mb-3 card" style="overflow-x:scroll;">
                        <div class="card-body">
                            <h5 class="card-title">Room Number : <?php $roomName = getThis("SELECT `roomName` FROM `rooms` WHERE `id` = '$roomId'");
                                                                    $roomName = $roomName[0]['roomName'];
                                                                    $roomName = e_d('d', $roomName);
                                                                    echo $roomName;
                                                                    ?> </h5>
                            <table class="mb-0 table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bed Number</th>
                                        <th>Status</th>
                                        <th>Patient Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    for ($i = 0; $i < sizeof($beds); $i++) {
                                        $temp = $beds[$i];
                                    ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?> </td>
                                            <td><?php echo e_d('d', $temp['bedNumber']);  ?> </td>
                                            <td>
                                                <?php
                                                $ipdId = $temp['currIpdId'];
                                                if ($ipdId == '0') {
                                                    echo "Empty";
                                                } else {
                                                    echo "Occupied";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $ipdId = $temp['currIpdId'];
                                                if ($ipdId == '0') {
                                                    echo "Not Available";
                                                } else {
                                                    $patientId = getThis("SELECT `patientId` FROM `ipdlog` WHERE `id`='$ipdId'");
                                                    $patientId = $patientId[0]['patientId'];
                                                    $patientDetails = getThis("SELECT `fullName` FROM `patients` WHERE `id` = '$patientId'");
                                                    $patientName = $patientDetails[0]['fullName'];
                                                    echo e_d('d', $patientName);
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $ipdId = $temp['currIpdId'];
                                                if ($ipdId == '0') {
                                                    echo "Not Available";
                                                } else {
                                                ?>
                                                    <a href="ipdPatientDetails.php?id=<?php echo e_d('e', $ipdId); ?>" class="btn btn-primary">View Details</a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- write contents here -->
                    <a href="functionality/completeRound.php?id=<?php echo e_d('e', $roundId); ?>" class="btn btn-primary btn btn-lg btn-block">Inspection Round Completed</a>

                </div>


            </div>
        </div>


</body>
