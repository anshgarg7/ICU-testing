<?php include "dash_common.php"; ?>
    <?php
    $details = getThis("SELECT  `fullName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `previousMedication`, `previousDiseases`,`familyHistory`,`allergicReactions`,`foodHabits`,`insuranceDetails` FROM `patients` WHERE `id` = '$id'");
    $details = $details[0];
    ?>
                <!-- form area starts -->
                <div class="app-main__outer">
                    <div class="app-main__inner">
                    <div class="col-lg-12">
                                <div class="main-card mb-10 card"   style="overflow-x:scroll;">
                                    <div class="card-body text-black "><h3 class="card-title">Personal Details</h3>

                                        <table class="mb-0 table table-striped" style='font-size:150%'>

                                            <tbody>
                                            <tr>

                                                <td>Name</td>
                                                <td><?php echo e_d('d',$details['fullName']); ?></td>
                                            </tr>
                                            <tr>

                                                <td>Contact Number</td>
                                                <td><?php echo e_d('d',$details['phoneNumber']); ?></td>
                                            </tr>
                                            <tr>

                                                <td>Email Address</td>
                                                <td><?php echo e_d('d',$details['emailAddress']); ?></td>
                                            </tr>
                                            <tr>

                                                <td>Postal Address</td>
                                                <td><?php echo e_d('d',$details['addressLine1']); ?></td>
                                            </tr>
                                            <tr>

                                                <td>city</td>
                                                <td><?php  $city = $details['cityID'];
                                                if($city == 0)
                                                {
                                                    echo "Unknown";
                                                }
                                                else {
                                                        $city_name = getThis("SELECT `id`,`name` FROM `cities` WHERE `id` = '$city' ");
                                                        $city_name = $city_name[0];
                                                        echo $city_name['name'];
                                                  }  ?></td>
                                            </tr>
                                            <tr>

                                                <td>State</td>
                                                <td><?php  $state = $details['stateID'];
                                                    if($state == 0)
                                                    {
                                                        echo "Unknown";
                                                    }
                                                    else{
                                                        $state_name = getThis("SELECT `id`,`name` FROM `states` WHERE `id` = '$state' ");
                                                        $state_name = $state_name[0];
                                                        echo $state_name['name']; }
                                                        ?></td>
                                            </tr>
                                            <tr>

                                                <td>Country</td>
                                                <td><?php  $country = $details['countryID'];
                                                if($country == 0)
                                                {
                                                    echo "Unknown";
                                                }else{
                                                        $country_name = getThis("SELECT `id`,`name` FROM `countries` WHERE `id` = '$country' ");
                                                        $country_name = $country_name[0];
                                                        echo $country_name['name'];
                                                  }  ?></td>
                                            </tr>
                                            <tr>

                                                <td>Username</td>
                                                <td><?php echo e_d('d',$details['username']); ?></td>
                                            </tr>
                                          </tbody>
                                      </table>
                                        <a class="mb-2 mr-2 btn btn-primary btn-lg btn-block" href="personal_update.php">Update Details</a>
                                      <table class="mb-0 table table-striped" style='font-size:150%'>

                                          <tbody>

                                            <tr>

                                                <td>Previous Diseases</td>
                                                <td><?php
                                                if($details['previousDiseases'] != NULL){
                                                $diseases = e_d('d',$details['previousDiseases']);
                                                $diseases = unserialize($diseases);
                                                for($i=0;$i<sizeof($diseases);$i++)
                                                {
                                                    echo $diseases[$i]."<br>";
                                                }
                                            }
                                            else
                                            {
                                                echo "None";
                                            }
                                                ?></td>
                                                <td><a class="mb-2 mr-2 btn btn-primary btn-lg btn-block" href="previous_medication.php">Update</a></td>
                                            </tr>
                                            <tr>

                                                <td>Previous Medication</td>
                                                <td><?php
                                                if($details['previousMedication'] != NULL){
                                                $medicine = e_d('d',$details['previousMedication']);
                                                $medicine = unserialize($medicine);

                                                for($i=0;$i<sizeof($medicine);$i++)
                                                {
                                                    echo $medicine[$i]."<br>";
                                                }
                                            }
                                            else
                                            {
                                                echo "None";
                                            }
                                                ?></td>
                                                <td><a class="mb-2 mr-2 btn btn-primary btn-lg btn-block" href="previous_medication.php">Update</a></td>
                                            </tr>
                                            <tr>

                                                <td>Family History</td>
                                                <td><?php
                                                if($details['familyHistory'] != NULL){
                                                $familyHistory = e_d('d',$details['familyHistory']);
                                                    echo $familyHistory."<br>";
                                            }
                                            else
                                            {
                                                echo "None";
                                            }
                                                ?></td>
                                                <td><a class="mb-2 mr-2 btn btn-primary btn-lg btn-block" href="family_history.php">Update</a></td>
                                            </tr>
                                            <tr>

                                                <td>Allergies/Drug Reactions</td>
                                                <td><?php
                                                if($details['allergicReactions'] != NULL){
                                                $allergicReactions = e_d('d',$details['allergicReactions']);
                                                $allergicReactions = unserialize($allergicReactions);

                                                for($i=0;$i<sizeof($allergicReactions);$i++)
                                                {
                                                    echo $allergicReactions[$i]."<br>";
                                                }
                                            }
                                            else
                                            {
                                                echo "None";
                                            }
                                                ?></td>
                                                <td><a class="mb-2 mr-2 btn btn-primary btn-lg btn-block" href="allergic_reactions.php">Update</a></td>
                                            </tr>
                                            <tr>

                                                <td>Food Habits</td>
                                                <td><?php
                                                if($details['foodHabits'] != NULL){
                                                $foodHabits = e_d('d',$details['foodHabits']);
                                                $foodHabits = unserialize($foodHabits);

                                                for($i=0;$i<sizeof($foodHabits);$i++)
                                                {
                                                    echo $foodHabits[$i]."<br>";
                                                }
                                            }
                                            else
                                            {
                                                echo "None";
                                            }
                                                ?></td>
                                                <td><a class="mb-2 mr-2 btn btn-primary btn-lg btn-block" href="food_habits.php">Update</a></td>
                                            </tr>
                                            <tr>

                                                <td>Insurance Details</td>
                                                <td><?php
                                                if($details['insuranceDetails'] != NULL){
                                                $insuranceDetails = e_d('d',$details['insuranceDetails']);

                                                    echo $insuranceDetails."<br>";
                                            }
                                            else
                                            {
                                                echo "None";
                                            }
                                                ?></td>
                                                <td><a class="mb-2 mr-2 btn btn-primary btn-lg btn-block" href="insurance_details.php">Update</a></td>
                                            </tr>
                                          </tbody>
                                      </table>
                                    </div>
                                </div>
                                <br>

                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
</div>
</body>
</html>
