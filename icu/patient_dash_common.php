<head>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/scripts/main.js"></script>
    </body>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Doctor Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="../assets/main.css" rel="stylesheet">
</head>
<?php
$pid = $_SESSION["patientIDforDoctor"];
?>

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
                                        <img width="42" class="rounded-circle" src="../assets/images/avatars/1.jpg" alt="">
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
                            <li>
                                <a href="queue.php">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Appointment Schedule
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Patient Options</li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Patient
                                </a>
                                <ul>
                                    <li>
                                        <a href="newprescription.php">
                                            <i class="metismenu-icon"></i>
                                            New Prescription
                                        </a>
                                    </li>
                                    <li>
                                        <a href="patientdetails.php">
                                            <i class="metismenu-icon"></i>
                                            Patient Details
                                        </a>
                                    </li>
                                    <li>
                                        <a href="previousprescriptions.php">
                                            <i class="metismenu-icon">
                                            </i>Previous Prescription
                                        </a>
                                    </li>
                                    <li>
                                        <a href="patientreports.php">
                                            <i class="metismenu-icon pe-7s-diamond"></i>
                                            Lab Test Reports
                                        </a>
                                    </li>
                                    <li>
                                        <a class="mb-2 mr-2 btn btn-primary" style="color:white" href="functionality/patient_checkoutact.php" onclick="return confirm('Are you sure you want to Checkout the Patient?');">Checkout Patient</a>
                                    </li>
                                    <li>
                                        <a class="mb-2 mr-2 btn btn-primary" href="give_date.php" style="color:white">
                                            Admit Patient
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="mb-2 mr-2 btn btn-primary" style="color:white">
                                            Admit Urgently
                                        </a>
                                    </li>
                                </ul>

                            </li>

                    </div>
                </div>
            </div>
