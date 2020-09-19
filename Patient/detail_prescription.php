<?php
include "dash_common.php"; 
$prescriptionID = $_GET['id'];
$prescriptionID = e_d('d',$prescriptionID);

$prescriptionDetails = getThis("SELECT  `hospitalID`, `doctorID`, `symptoms`, `dietAdvice`, `specialAdvice`, `medicinePrescribed`, `medicineDosage`, `medicineInstructions`, `generatedAt`, `updatedAt` FROM `prescription` WHERE `id` = '$prescriptionID' ");
   $prescriptionDetails = $prescriptionDetails[0];
?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card-body"><h5 class="card-title">Prescritpion Details</h5>
                                        <table class="mb-0 table table-striped">
                                            <tr>
                                                <td>Doctor Name</td>
                                                <td><?php
                                                $doctorId = $prescriptionDetails['doctorID'];
                                                $name = getThis("SELECT `fullName` FROM `doctors` WHERE `id` = '$doctorId'");
                                                echo e_d('d',$name[0]['fullName']);
                                                ?></td>
                                                
                                            </tr>
                                            <tr>
                                            <td>Hospital Name</td>
                                                <td><?php
                                                $hospitalId = $prescriptionDetails['hospitalID'];
                                                $name = getThis("SELECT `hospitalName` FROM `hospitals` WHERE `id` = '$hospitalId'");
                                                echo e_d('d',$name[0]['hospitalName']);
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <td>Consultation Date</td>
                                                <td><?php echo substr($prescriptionDetails['generatedAt'],0,10); ?></td>
                                            </tr>
                                            <tr>
                                            <td>Special Advice</td>
                                                <td><?php
                                                echo e_d('d',$prescriptionDetails['specialAdvice']);
                                                ?></td>
                                            </tr>
                                            <tr>
                                            <td>Diet Advice</td>
                                                <td><?php
                                                echo e_d('d',$prescriptionDetails['dietAdvice']);
                                                ?></td>
                                            </tr>
                                            <tr>
                                            <td>Symptoms</td>
                                                <td><?php
                                               $temp = e_d('d',$prescriptionDetails['symptoms']);
                                               $temp = unserialize($temp);

                                               for($i=0;$i<sizeof($temp);$i++)
                                               {
                                                   echo $temp[$i]."<br>";
                                               }
                                                ?></td>
                                            </tr>
                                        </table>
        </div>

        <div class="card-body"><h5 class="card-title">Medicine Details</h5>
            <table class="mb-0 table table-striped">
                <thead>
                    <th>Medicine Prescribed</th>
                    <th>Dosage</th>
                    <th>Instructions</th>
                </thead>
                <tbody>
                    <?php
                    $med = e_d('d',$prescriptionDetails['medicinePrescribed']);
                    $med = unserialize($med);
                    $dose = e_d('d',$prescriptionDetails['medicineDosage']);
                    $dose = unserialize($dose);
                    $instructions = e_d('d',$prescriptionDetails['medicineInstructions']);
                    $instructions = unserialize($instructions);
                    
                    for($i=0;$i<sizeof($med); $i++)
                    {
                        ?>
                        <tr>
                            <td>
                                <?php echo $med[$i]; ?>
                            </td>
                            <td>
                                <?php echo $dose[$i]; ?>
                            </td>
                            <td>
                                <?php echo $instructions[$i]; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    
                    
                </tbody>


                </table>
                <br><br>
                <button class = "btn btn-primary btn btn-lg btn-block" onclick="window.print()">Print Page</button>