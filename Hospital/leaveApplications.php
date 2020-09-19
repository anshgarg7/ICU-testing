<?php
include "dash_common.php";
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
                    <h5 class="card-title">Doctor Tokens</h5>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Doctor Name</th>
                                <th>Leave From</th>
                                <th>Leave To</th>
                                <th>Requested At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $leaves = getThis("SELECT `id`, `doctorID`,  `leaveFrom`, `leaveTo`, `generatedAt`, `enabled` FROM `doctorleaves` WHERE `hospitalID` = '$id' AND `enabled` = '0'");
                            for ($i = 0; $i < sizeof($leaves); $i++) {
                            ?>
                                <tr>
                                    <td> <?php echo $i + 1; ?>
                                    </td>
                                    <td>
                                        <?php $did = $leaves[$i]['doctorID'];
                                        $dname = getThis("SELECT `fullName` FROM `doctors` WHERE `id`= '$did'");
                                        $dname = $dname[0]['fullName'];
                                        echo e_d('d', $dname);
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo substr($leaves[$i]['leaveFrom'], 0, 10); ?>
                                    </td>
                                    <td>
                                        <?php echo substr($leaves[$i]['leaveTo'], 0, 10); ?>
                                    </td>
                                    <td>
                                        <?php echo substr($leaves[$i]['generatedAt'], 0, 10); ?>
                                    </td>
                                    <td>
                                        <a href="functionality/rejectLeave.php?id=<?php echo e_d('e', $leaves[$i]['id']); ?>" class="btn btn-primary"> Reject</a>
                                        <a href="functionality/acceptLeave.php?id=<?php echo e_d('e', $leaves[$i]['id']); ?>" class="btn btn-primary"> Approve</a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>