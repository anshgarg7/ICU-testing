<?php include "dash_common.php"; ?>
    <?php
    $details = getThis("SELECT  `fullName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username` FROM `patients` WHERE `id` = '$id'");
    $details = $details[0];
    $countryID = $details['countryID'];
    $stateID = $details['stateID'];
    $cityID = $details['cityID'];
    $country = getThis("SELECT `id`, `name` FROM `countries` WHERE `id`='$countryID'");
    $country = $country[0];
    $state = getThis("SELECT `id`, `name` FROM `states` WHERE `id`='$stateID'");
    $state = $state[0];
    $city = getThis("SELECT `id`, `name` FROM `cities` WHERE `id`='$cityID'");
    $city = $city[0];
    ?>
                <!-- form area starts -->
                <div class="app-main__outer">
                    <div class="app-main__inner">
                    <div class="col-lg-12">
                      <form action="functionality/personal_updateact.php" method="POST">
                          <div class="position-relative form-group"><label for="exampleAddress" class=""><b>Full Name</b></label><input name="fullName" id="fullName"  class="form-control" value="<?php echo e_d('d',$details['fullName']); ?>"></div>
                            <div class="position-relative form-group"><label for="exampleAddress" class=""><b>Contact Number</b></label><input name="phoneNumber" id="phoneNumber"  class="form-control" value="<?php echo e_d('d',$details['phoneNumber']); ?>"></div>
                              <div class="position-relative form-group"><label for="exampleAddress" class=""><b>Email Address</b></label><input name="emailAddress" id="emailAddress"  class="form-control" value="<?php echo e_d('d',$details['emailAddress']); ?>"></div>
                                <div class="position-relative form-group"><label for="exampleAddress" class=""><b>Postal Address</b></label><input name="addressLine1" id="addressLine1"  class="form-control" value="<?php echo e_d('d',$details['addressLine1']); ?>"></div>
                       					<div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">Country</span></label><select class="form-control" name="country" id="Country_c" required>
                                          <option value="<?php echo $countryID; ?>" selected><?php echo $country['name']; ?></option>
                                          <?php $country = getThis("SELECT `id`, `name` FROM `countries` ORDER BY `name` ASC") ?>
                                          <?php foreach ($country as $k => $c) { ?>
                                          <option value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
                                         <?php } ?>
                                        </select></div>
                      				<div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">State</span></label><select class="form-control" name="state" id="State_c" required>
                                            <option value="<?php echo $stateID; ?>" selected><?php echo $state['name']; ?></option>
                      		                  </select></div>
                      						<div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">City</span></label><select class="form-control" name="city" id="City_c" required>
                      	                    <option value="<?php echo $cityID; ?>" selected><?php echo $city['name']; ?></option>
                                       </select></div>
                                      <div class="position-relative form-group"><label for="exampleAddress" class=""><b>Username</b></label><input name="username" id="username"  class="form-control" value="<?php echo e_d('d',$details['username']); ?>"></div>

                          <input type="hidden" name="patientID" value="<?php echo $id; ?>">
                          <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Update</button>
                      </form>

                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
    $("#Country_c").change(function(){
      var CountryID = $("#Country_c").val();
      $.ajax({
        url: '../assets/updateworld.php',
        method: 'post',
        data: 'Country='+CountryID
      }).done(function(countries){
        states = JSON.parse(countries);
        $('#State_c').empty();
        $('#State_c').append('<option disabled selected>Select State</option>');
        states.forEach(function(state){
          $('#State_c').append('<option value='+state.id+'>'+state.name+'</option>');
        })
        $('#State_c').append('<option value=0>My option is not listed</option>');
      })
    });
    $("#State_c").change(function(){
      var StateID = $("#State_c").val();
      $.ajax({
        url: '../assets/updateworld.php',
        method: 'post',
        data: 'State='+StateID
      }).done(function(states){
        cities = JSON.parse(states);
        $('#City_c').empty();
        $('#City_c').append('<option disabled selected>Select City</option>');
        cities.forEach(function(city){
          $('#City_c').append('<option value='+city.id+'>'+city.name+'</option>');
        })
        $('#City_c').append('<option value=0>My option is not listed</option>');
      })
    });
  })
  </script>
