<?php
include "../assets/fxn.php";
// include "inner_links.php";
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


?>
<!doctype html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <!-- date picker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Patient Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="../assets/main.css" rel="stylesheet">

    <script type="text/javascript" src="../assets/scripts/main.js"></script>
</head>

<body>
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

                                        <img width="42" class="rounded-circle" src="../assets/images/avatars/1.jpg" alt="">

                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php echo $name; ?>
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
                                    User's Dashboard
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Options</li>
                            <li>
                                <a href="personal_details.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Your Details
                                </a>
                                <a href="report_table.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    View Your Test Reports
                                </a>
                                <a href="previous_prescription.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Prescriptions(Previous)
                                </a>
                                <a href="previous_medication.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Medical History(Previous)
                                </a>
                                <a href="appointment.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Take Appointment
                                </a>
                                <a href="appointment_details.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    View Future Appointments
                                </a>
                                <a href="discussion.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Discussion Panel
                                </a>
                                <a href="ipdAppointment.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    IPD Appointments
                                </a>
                            </li>
                    </div>
                </div>
            </div>
