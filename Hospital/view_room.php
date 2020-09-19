<?php
include "dash_common.php";
$hospitalId = $_SESSION["UID"];
$rooms = getThis("SELECT  `id`,`roomName`, `roomDescription`, `roomLocation`, `totalBeds` FROM `rooms` WHERE `hospitalId` = '$hospitalId'");
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
                    <h5 class="card-title">Rooms Registered</h5>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Room Name</th>
                                <th>Description</th>
                                <th>No. Of Beds</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < sizeof($rooms); $i++) {

                            ?>
                                <tr>
                                    <th><?php echo ($i + 1); ?> </th>

                                    <td><?php echo e_d('d', $rooms[$i]['roomName']); ?></td>
                                    <td>
                                        <?php echo e_d('d', $rooms[$i]['roomDescription']); ?>
                                    </td>
                                    <td>
                                        <?php echo $rooms[$i]['totalBeds']; ?>
                                    </td>
                                    <td>
                                        <?php echo e_d('d', $rooms[$i]['roomLocation']); ?>
                                    </td>
                                    <td>
                                        <a href="view_room_details.php?id=<?php echo e_d('e', $rooms[$i]['id']); ?>" class="mb-2 mr-2 btn btn-primary">Details</a>
                                        <a href="new_beds.php?id=<?php echo e_d('e', $rooms[$i]['id']); ?>" class="mb-2 mr-2 btn btn-primary">Add Beds</a>

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