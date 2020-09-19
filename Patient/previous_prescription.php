<?php
include "dash_common.php";

?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-12">
           <div class="main-card mb-3 card"   style="overflow-x:scroll;">
                                    <div class="card-body"><h5 class="card-title">Prescription Summary</h5>
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Consultation Date</th>
                                                <th>Doctor Name</th>
                                                <th>Hospital Name</th>
                                                <th>Symptoms</th>
                                                <!-- <th>Special Advices</th> -->
                                                <!-- <th>Diet Advice</th> -->
                                                <th>Medicines</th>
                                                <th>Details</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $prescription = getThis("SELECT `id`, `hospitalID`, `doctorID`,  `symptoms`, `dietAdvice`, `specialAdvice`, `medicinePrescribed`, `medicineDosage`, `medicineInstructions`, `generatedAt` FROM `prescription` WHERE `patientID` = '$id' ORDER BY `generatedAt` DESC");

                                                ?>

                                                <?php
                                                for($i=0;$i<sizeof($prescription);$i++)
                                                {
                                                    $temp = $prescription[$i];
                                                    ?>
                                                    <tr>
                                                <th scope="row"><?php echo $i+1; ?></th>
                                                <?php $date = date('<b>d M</b> Y',strtotime(substr($temp['generatedAt'],0,10))); ?>
                                                <td><?php echo $date; ?></td>
                                                <td><?php
                                                $doctorId = $temp['doctorID'];
                                                $name = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = '$doctorId'");
                                                echo e_d('d',$name[0]['fullName']);
                                                ?></td>
                                                <td><?php
                                                $hospitalId = $temp['hospitalID'];
                                                $name = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id` = '$hospitalId'");
                                                echo e_d('d',$name[0]['hospitalName']);
                                                ?></td>
                                                <td>
                                                    <?php
                                                    $symptom = $temp['symptoms'];
                                                    $symptom = e_d('d',$symptom);
                                                    $symptom = unserialize($symptom);
                                                    for($j = 0;$j<sizeof($symptom);$j++)
                                                    {
                                                        echo $symptom[$j]."<br>";
                                                    }

                                                    ?>
                                                </td>


                                                <td>
                                                    <?php
                                                    $medicine = $temp['medicinePrescribed'];
                                                    $medicine = e_d('d',$medicine);
                                                    $medicine = unserialize($medicine);
                                                    for($j = 0;$j<sizeof($medicine);$j++)
                                                    {
                                                        echo $medicine[$j]."<br>";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                <a href="detail_prescription.php?id=<?php echo e_d('e',$temp['id']); ?>" >View Details</a>
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
