<?php
include "dash_common.php";
$reports = getThis("SELECT `id`, `patientID`, `sampleName`, `sampleType`, `testName` FROM `labreports` WHERE `reportUploaded` = '0' AND `laboratoryID` = '$id'");
?>
<div class="app-main__outer">
    <div class="app-main__inner">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Samples Collected By the Laboratory</h5>
            <table class="mb-0 table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <!-- <th>Test Name</th> -->
                    <th>Sample Name</th>
                    <th>Sample Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    for($i=0;$i<sizeof($reports);$i++)
                    {
                        ?>
                        <tr>
                        <td><?php echo $i+1; ?> </td>
                        <td><?php $temp_pid = $reports[$i]['patientID'];
                            $temp_name = getThis("SELECT `fullName` FROM `patients` WHERE `id` = '$temp_pid'");
                            $temp_name = $temp_name[0]['fullName'];
                            echo e_d('d',$temp_name); ?>
                            </td>
                          
                        <td><?php $temp_sample =  e_d('d',$reports[$i]['sampleName']);
                            $temp_sample = unserialize($temp_sample);
                            for($x=0;$x<sizeof($temp_sample);$x++)
                            {
                                echo $temp_sample[$x]."<br>";
                            }
                        ?> </td>
                        <td><?php $temp_type =  e_d('d',$reports[$i]['sampleType']); 
                            $temp_type = unserialize($temp_type);
                            for($x=0;$x<sizeof($temp_type);$x++)
                            {
                                echo $temp_type[$x]."<br>";
                            }
                            
                        ?> </td>

                            <td><a href="uploadcontent.php?id=<?php echo e_d('e',$reports[$i]['id']); ?>" class="btn btn-primary">Upload Report</a></td>
                        </tr>
                        <?php
                    }?>
                </tbody>
                </table>
                </div>
