<?php
include "dash_common.php";
$flag = 0;
if (isset($_POST["submitCheck"])) {
  $name = e_d('e', $_POST["patientName"]);
  $phone = e_d('e', trim($_POST["phoneNumber"]));

  $check = getThis("SELECT * FROM `patients` WHERE `fullName`='$name' AND `phoneNumber`='$phone'");

  $flag = 0;
  if (sizeof($check) > 0) {
    $flag = 1;
    $check = $check[0];
  }
}

?>



<!-- form area starts -->
<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">

          <div>Admit Patient
            <div class="page-title-subheading"><?php echo $roomDescription; ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Admission Form</h5>
            <form action="admit_patient.php" method="POST">
              <div class="row">

                <div class="col-md-6">
                  <b>Patient Name</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="patientName" placeholder="Enter Patient Name" class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <b>Phone Number</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="phoneNumber" placeholder="Enter Patient Phone Number" class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submitCheck">Submit</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>








    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Admission Form</h5>
            <form action="functionality/admit_patient_act.php" method="POST">
              <div class="row">

                <div class="col-md-6">
                  <b>Patient Name</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="patientName" placeholder="Enter Patient Name" class="form-control name_list" <?php if ($flag == 1) { ?> value="<?php echo trim(e_d('d', $check['fullName'])); ?>" <?php } ?> /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <b>Phone Number</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="phoneNumber" placeholder="Enter Patient Phone Number" class="form-control name_list" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['phoneNumber']); ?>" <?php } ?> /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  <b>Email Address</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="email" name="emailAddress" placeholder="Enter Patient Email Address" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['emailAddress']); ?>" <?php } ?> class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  <b>Emergency Contact</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="emergency" placeholder="Emergency Contact Number" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['emergencyPhone']); ?>" <?php } ?> class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  <b>House Address</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="addressLine1" placeholder="Address Line 1" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['addressLine1']); ?>" <?php } ?> class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>


                <div class="col-md-4">

                  <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">Country</span></label><select class="form-control" name="country" id="Country_c" required>
                      <option selected disabled>Select Country</option>
                      <?php if ($flag == 1) {
                      ?>
                        <option selected value="<?php echo $check["countryID"]; ?>"><?php
                                                                                    $tempID = $check["countryID"];
                                                                                    $country = getThis("SELECT `name` from `countries` WHERE `id`='$tempID' ");
                                                                                    $country = $country[0]['name'];
                                                                                    echo $country; ?>
                        </option>
                      <?php
                      }
                      ?>
                      <?php $country = getThis("SELECT `id`, `name` FROM `countries` ORDER BY `name` ASC") ?>
                      <?php foreach ($country as $k => $c) { ?>
                        <option value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
                      <?php } ?>
                    </select></div>
                </div>
                <div class="col-md-4">

                  <div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">State</span></label><select class="form-control" name="state" id="State_c" required>
                      <option disabled selected>Select Country First</option>
                      <?php if ($flag == 1) {
                      ?>
                        <option selected value="<?php echo $check["stateID"]; ?>"><?php
                                                                                  $tempID = $check["stateID"];
                                                                                  $state = getThis("SELECT `name` from `states` WHERE `id`='$tempID' ");
                                                                                  $state = $state[0]['name'];
                                                                                  echo $state; ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select></div>
                </div>
                <div class="col-md-4">
                  <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">City</span></label><select class="form-control" name="city" id="City_c" required>
                      <option disabled selected>Select State First</option>
                      <?php if ($flag == 1) {
                      ?>
                        <option selected value="<?php echo $check["cityID"]; ?>"><?php
                                                                                  $tempID = $check["cityID"];
                                                                                  $city = getThis("SELECT `name` from `cities` WHERE `id`='$tempID' ");
                                                                                  $city = $city[0]['name'];
                                                                                  echo $city; ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select></div>
                </div>
                <div class="col-md-12">
                  <b>Previous Medication</b>
                  <div class="table-responsive">

                    <?php
                    $x = 0;
                    if ($flag == 1) {
                    ?>
                      <button type="button" name="add1" id="add1" class="btn btn-block btn-primary">Add More</button>
                      <table class="table" id="dynamic_field1">
                        <?php
                        $previousMedication = e_d('d', $check['previousMedication']);
                        $previousMedication = unserialize($previousMedication);

                        for (; $x < sizeof($previousMedication); $x++) {
                        ?>
                          <tr id="rowrm1<?php echo $x + 1; ?>">
                            <td><input type="text" name="previousMedication[]" value="<?php echo $previousMedication[$x]; ?>" class="form-control name_list" /></td>
                            <td><button type="button" name="remove" id="rm1<?php echo ($x + 1); ?>" class="btn btn-danger btn_remove">X</button></td>
                          </tr>
                        <?php

                        }
                        ?>
                      </table>
                    <?php
                    } else {
                    ?>

                      <table class="table " id="dynamic_field1">
                        <tr>
                          <td><input type="text" name="previousMedication[]" placeholder="Enter Previous Medication" class="form-control name_list" /></td>
                          <td><button type="button" name="add1" id="add1" class="mt-2 btn btn-primary">Add More</button></td>
                        </tr>
                      </table>
                    <?php } ?>
                  </div>
                </div>





                <div class="col-md-12">
                  <b>Previous Diseases</b>
                  <div class="table-responsive">
                    <?php
                    $y = 0;
                    if ($flag == 1) {
                    ?>
                      <button type="button" name="add2" id="add2" class="btn btn-block btn-primary">Add More</button>
                      <table class="table" id="dynamic_field2">
                        <?php
                        $previousDiseases = e_d('d', $check['previousDiseases']);
                        $previousDiseases = unserialize($previousDiseases);

                        for (; $y < sizeof($previousDiseases); $y++) {
                        ?>
                          <tr id="rowrm2<?php echo $y + 1; ?>">
                            <td><input type="text" name="$previousDiseases[]" value="<?php echo $previousDiseases[$y]; ?>" class="form-control name_list" /></td>
                            <td><button type="button" name="remove" id="rm2<?php echo $y + 1; ?>" class="btn btn-danger btn_remove">X</button></td>
                          </tr>
                        <?php

                        }
                        ?>
                      </table>
                    <?php
                    } else {
                    ?>
                      <table class="table " id="dynamic_field2">
                        <tr>
                          <td><input type="text" name="previousDiseases[]" placeholder="Enter Previous Major Diseases" class="form-control name_list" /></td>
                          <td><button type="button" name="add2" id="add2" class="mt-2 btn btn-primary">Add More</button></td>
                        </tr>
                      </table>
                    <?php } ?>
                  </div>
                </div>







                <div class="col-md-12">
                  <b>Allergies</b>
                  <div class="table-responsive">
                    <?php
                    $z = 0;
                    if ($flag == 1) {
                    ?>
                      <button type="button" name="add3" id="add3" class="btn btn-block btn-primary">Add More</button>
                      <table class="table" id="dynamic_field3">
                        <?php
                        $allergicReactions = e_d('d', $check['allergicReactions']);
                        $allergicReactions = unserialize($allergicReactions);
                        for (; $z < sizeof($allergicReactions); $z++) {
                        ?>
                          <tr id="rowrm3<?php echo $z + 1; ?>">
                            <td><input type="text" name="allergicReactions[]" value="<?php echo $allergicReactions[$z]; ?>" class="form-control name_list" /></td>
                            <td><button type="button" name="remove" id="rm3<?php echo $z + 1; ?>" class="btn btn-danger btn_remove">X</button></td>
                          </tr>
                        <?php

                        }
                        ?>
                      </table>
                    <?php
                    } else {
                    ?>
                      <table class="table " id="dynamic_field3">
                        <tr>
                          <td><input type="text" name="allergicReactions[]" placeholder="Enter Allergic Reactions" class="form-control name_list" /></td>
                          <td><button type="button" name="add3" id="add3" class="mt-2 btn btn-primary">Add More</button></td>
                        </tr>
                      </table>
                    <?php } ?>
                  </div>
                </div>

                <div class="col-md-12">
                  <b>Family History</b>
                  <div class="table-responsive">
                    <table class="table " id="dynamic_field">
                      <tr>
                        <td><input type="text" name="familyHistory" placeholder="Family History" <?php if ($flag == 1) { ?> value="<?php echo e_d('d', $check['familyHistory']); ?>" <?php } ?> class="form-control name_list" /></td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="col-md-12">
                  <b>Food Habits</b>
                  <div class="table-responsive">

                    <?php
                    $p = 0;
                    if ($flag == 1) {
                    ?>
                      <button type="button" name="add4" id="add4" class="btn btn-block btn-primary">Add More</button>
                      <table class="table" id="dynamic_field4">
                        <?php
                        $foodHabits = e_d('d', $check['foodHabits']);
                        $foodHabits = unserialize($foodHabits);
                        for (; $p < sizeof($foodHabits); $p++) {
                        ?>
                          <tr id="rowrm4<?php echo $p + 1; ?>">
                            <td><input type="text" name="foodHabits[]" value="<?php echo $foodHabits[$p]; ?>" class="form-control name_list" /></td>
                            <td><button type="button" name="remove" id="rm4<?php echo $p + 1; ?>" class="btn btn-danger btn_remove">X</button></td>
                          </tr>
                        <?php

                        }
                        ?>
                      </table>
                    <?php
                    } else {
                    ?>

                      <table class="table " id="dynamic_field4">
                        <tr>
                          <td><input type="text" name="foodHabits[]" placeholder="Enter Food Habits" class="form-control name_list" /></td>
                          <td><button type="button" name="add4" id="add4" class="mt-2 btn btn-primary">Add More</button></td>
                        </tr>
                      </table>
                    <?php } ?>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">State</span></label>
                    <select class="form-control" name="bed" id="bed" required>
                      <option disabled selected>Select Bed Number</option>
                      <?php $beds = getThis("SELECT `id`, `bedNumber`, `bedUsability`, `equipmentAvailable` FROM `beds` WHERE `roomID`='$id' AND `currIpdId`=0");
                      for ($i = 0; $i < sizeof($beds); $i++) {
                        $bed = $beds[$i];
                      ?>
                        <option value="<?php echo $bed['id']; ?>"><?php echo e_d('d', $bed['bedNumber']); ?></option>
                      <?php
                      }
                      ?>
                    </select></div>
                </div>
                <input type="hidden" name="hospitalID" value="<?php echo $hospitalID; ?>">
                <input type="hidden" name="flag" value="<?php echo $flag; ?>">

                <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</body>

</html>

<script>
  $(document).ready(function() {
    var i = <?php echo $x; ?>;
    $('#add1').click(function() {
      i++;
      $('#dynamic_field1').append('<tr id="rowrm1' + i + '"><td><input type="text" name="previousMedication[]" placeholder="Enter Previous Medication" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm1' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>
<script>
  $(document).ready(function() {
    var j = <?php echo $y; ?>;
    $('#add2').click(function() {
      j++;
      $('#dynamic_field2').append('<tr id="rowrm2' + j + '"><td><input type="text" name="previousDiseases[]" placeholder="Enter Previous Diseases" class="form-control name_list" /></td><td><button type="button" name="remove" id="rm2' + j + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>
<script>
  $(document).ready(function() {
    var k = <?php echo $z; ?>;
    $('#add3').click(function() {
      k++;
      $('#dynamic_field3').append('<tr id="rowrm3' + k + '"><td><input type="text" placeholder="Enter the allergic reactions" name="allergicReactions[]" class="form-control name_list" /></td><td><button type = "button" name = "remove" id = "rm3' + k + '" class = "btn btn-danger btn_remove"> X </button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>

<script>
  $(document).ready(function() {
    var l = <?php echo $p; ?>;
    $('#add4').click(function() {
      l++;
      $('#dynamic_field4').append('<tr id="rowrm4' + l + '"><td><input type="text" name="foodHabits[]" placeholder="Enter Food Habits" class="form-control name_list" /></td><td><button type = "button" name = "remove" id = "rm4' + l + '" class = "btn btn-danger btn_remove"> X </button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $("#Country_c").change(function() {
      var CountryID = $("#Country_c").val();
      $.ajax({
        url: '../assets/worldData.php',
        method: 'post',
        data: 'Country=' + CountryID
      }).done(function(countries) {
        states = JSON.parse(countries);
        $('#State_c').empty();
        $('#State_c').append('<option disabled selected>Select State</option>');
        states.forEach(function(state) {
          $('#State_c').append('<option value=' + state.id + '>' + state.name + '</option>');
        })

      })
    });
    $("#State_c").change(function() {
      var StateID = $("#State_c").val();
      $.ajax({
        url: '../assets/worldData.php',
        method: 'post',
        data: 'State=' + StateID
      }).done(function(states) {
        cities = JSON.parse(states);
        $('#City_c').empty();
        $('#City_c').append('<option disabled selected>Select City</option>');
        cities.forEach(function(city) {
          $('#City_c').append('<option value=' + city.id + '>' + city.name + '</option>');
        })
        $('#City_c').append('<option value=0>My option is not listed</option>');
      })
    });
  });
</script>