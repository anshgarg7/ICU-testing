<?php
include "dash_common.php";

?>

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
        $('#State_c').append('<option value=0>My option is not listed</option>');
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


    $("#City_c").change(function() {
      var CityID = $("#City_c").val();
      $.ajax({
        url: '../assets/worldData.php',
        method: 'post',
        data: 'City=' + CityID
      }).done(function(cities) {
        hospitals = JSON.parse(cities);
        $('#hospital_c').empty();
        $('#hospital_c').append('<option disabled selected>Select Hospital</option>');
        hospitals.forEach(function(hospital) {
          $('#hospital_c').append('<option value=' + hospital.id + '>' + hospital.hospitalName + '</option>');
        })
        $('#hospital_c').append('<option value=0>My option is not listed</option>');
      })
    });

    $("#hospital_c").change(function() {
      var hospitalID = $("#hospital_c").val();
      $.ajax({
        url: '../assets/worldData.php',
        method: 'post',
        data: 'hospital=' + hospitalID
      }).done(function(hospitals) {
        doctors = JSON.parse(hospitals);
        $('#doctor_c').empty();
        $('#doctor_c').append('<option disabled selected>Select Doctor</option>');
        doctors.forEach(function(doctor) {
          $('#doctor_c').append('<option value=' + doctor.doctorID + '>' + doctor.fullName + "-" + doctor.departmentName + "-" + doctor.qualificationName + '</option>');
        })
        $('#doctor_c').append('<option value=0>My option is not listed</option>');
      })
    });

    workingDays = [0, 1, 2, 3, 4, 5, 6];
    disabledDates = [""];
    $("#doctor_c").change(function() {
      var doctorID = $("#doctor_c").val();
      $.ajax({
        url: '../assets/worldData.php',
        method: 'post',
        data: 'doctor=' + doctorID
      }).done(function(doctors) {
        workingDays = JSON.parse(doctors);
      })
    });

    $("#doctor_c").change(function() {
      var doctorID = $("#doctor_c").val();
      $.ajax({
        url: '../assets/worldData.php',
        method: 'post',
        data: 'doctor1=' + doctorID
      }).done(function(doctors1) {
        disabledDates = JSON.parse(doctors1);
      })
    });

    // $(function () {
    //         $("#datepicker").datepicker();
    //     });

  })
</script>
<script>
  function myFunction(ele) {
    var srcElement = document.getElementById(ele);
    if (srcElement != null) {
      if (srcElement.style.display == "block") {
        srcElement.style.display = 'none';
      } else {
        srcElement.style.display = 'block';
      }
      return false;
    }
  }
</script>
<script>
  $(function() {
    $("#datepicker").datepicker({
      // showOn: "button",
      // buttonText: "Select Date",
      minDate: 0,
      beforeShowDay: function(date) {
        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        return [workingDays.indexOf(date.getDay()) > -1 && disabledDates.indexOf(string) == -1];
      }
    });
  });
</script>


<div class="app-main__outer">
  <div class="app-main__inner">
    <form action="appointment1.php" method="post">
      <div class="wrap-input100">
        <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">Country</span></label><select class="form-control" name="country" id="Country_c" required>
            <option selected disabled>Select Country</option>
            <?php $country = getThis("SELECT `id`, `name` FROM `countries` ORDER BY `name` ASC") ?>
            <?php foreach ($country as $k => $c) { ?>
              <option value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
            <?php } ?>
          </select></div>
      </div>
      <div class="wrap-input100">
        <div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">State</span></label><select class="form-control" name="state" id="State_c" required>
            <option disabled selected>Select Country First</option>
          </select></div>
      </div>
      <div class="wrap-input100">
        <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">City</span></label><select class="form-control" name="city" id="City_c" required>
            <option disabled selected>Select State First</option>
          </select></div>
      </div>
      <div class="wrap-input100">
        <div class="position-relative form-group"><label for="exampleHosp" class=""><span class="label-input100">Hospital</span></label><select class="form-control" name="hospital" id="hospital_c" required>
            <option disabled selected>Select City First</option>
          </select></div>
      </div>
      <div class="wrap-input100">
        <div class="position-relative form-group"><label for="exampledoc" class=""><span class="label-input100">Doctors</span></label><select class="form-control" name="doctor" id="doctor_c" required>
            <option disabled selected>Select Hospital First</option>
          </select></div>
      </div>
      <!-- <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="button" name="datedivopen" onclick="myFunction('datediv')">Select Date</button> -->
      <!-- <div class="wrap-input100">
				<div class="position-relative form-group"><label for="exampledoc" class=""><span class="label-input100">Time</span></label><select class="form-control" name="time" id="time_c" required>
	                    <option disabled selected>Select Doctor First</option>
		                  </select></div>
              </div> -->
      <!-- Date of Appointment : <input type="date" name="date" > <br> -->




      <!-- <div class="position-relative form-group"><label for="exampleAddress" class="">Date Of Appointment</label><input name="date"  type="date" class="form-control"></div> -->
      <!-- <div class="position-relative form-group" id="datediv" style="display:none;"> -->
      <label for="exampleAddress" class="">Date Of Appointment</label><input name="date" type="text" id="datepicker" class="form-control">
      <!-- </div> -->



      <h3> Please Click Submit to Select Time For Appointment</h3><br>
      <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Submit</button>
    </form>
  </div>
</div>
</body>

</html>





<script>

</script>
