<?php
include "dash_common.php";

if (isset($_POST['submit']) || $_POST['scheduled'] == '1') {
    $department = $_POST['department'];
    $doctorId = $_POST['doctor'];
    echo $doctorId;
    $result = getThis("SELECT `doctorID`, `roomID`, `roundDate`, `enabled` FROM `ipdrounds` WHERE `doctorID` = '$doctorId'");
}
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
        <div class="row">
            <div class="col-md-12">
                <form action="functionality/ipdroundact.php" method="POST">
                    <div class="wrap-input100">
                        <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">
                                    <h5>Room Selection</h5>
                                </span></label><select class="form-control" name="room" id="room_c" required>
                                <option selected disabled>Select Room For Round</option>
                                <?php $room = getThis("SELECT `id`, `roomName` FROM `rooms` WHERE `hospitalId` = '$id'"); ?>
                                <?php foreach ($room as $k => $c) { ?>
                                    <option value="<?php echo $c['id']; ?>"><?php echo e_d('d', $c['roomName']); ?></option>
                                <?php } ?>

                            </select></div>
                        <input type="date" name="date" class="form-control name_list" required />
                        <br>
                        <input type="hidden" name="doctor" value="<?php echo $doctorId; ?>">
                        <input type="hidden" name="department" value="<?php echo $department; ?>">

                        <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="main-card mb-3 card" style="overflow-x:scroll;">
                    <div class="card-body">
                        <h5 class="card-title">Doctor Tokens</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Room Name</th>
                                    <th>Doctor Assigned</th>
                                    <th>Date Assigned</th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < sizeof($result); $i++) {
                                    $temp = $result[$i];
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $i + 1; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $rid = $temp['roomID'];
                                            $rname = getThis("SELECT `roomName` FROM `rooms` WHERE `id` = '$rid' ");
                                            $rname = $rname[0]['roomName'];
                                            echo $rid . " -> " . e_d('d', $rname);
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $did = $temp['doctorID'];
                                            $dname = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = '$did'");
                                            $dname = $dname[0]['fullName'];
                                            echo e_d('d', $dname);
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo substr($temp['roundDate'], 0, 10); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $activity = $temp['enabled'];
                                            if ($activity == '1') {
                                                echo "Pending";
                                            } else {
                                                echo "Round Completed";
                                            }
                                            ?>
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
</div>