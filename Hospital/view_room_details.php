<?php
include "dash_common.php";
$hospitalId = $_SESSION["UID"];
$roomId = $_GET['id'];
$roomId = e_d('d', $roomId);
$beds = getThis("SELECT `bedNumber`, `bedUsability`, `equipmentAvailable`,`enabled` FROM `beds` WHERE `roomId` = '$roomId' ");
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


        <div class="col-md-12">
            <div class="main-card mb-3 card" style="overflow-x:scroll;">
                <div class="card-body">
                    <h5 class="card-title">Beds Registered</h5>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bed Number</th>
                                <th>Availability Status</th>
                                <th>Used For</th>
                                <th>Equipments Available</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < sizeof($beds); $i++) {

                            ?>
                                <tr>
                                    <td>
                                        <?php echo ($i + 1); ?>
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $beds[$i]['bedNumber']); ?>
                                    </td>
                                    <td>
                                        <?php if ($beds[$i]['enabled'] == 0) {
                                            echo "Available";
                                        } else {
                                            echo "Occupied";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $beds[$i]['bedUsability']); ?>
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $beds[$i]['equipmentAvailable']); ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>