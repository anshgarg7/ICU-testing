<?php include "dash_common.php"; ?>
    <?php
    $details = getThis("SELECT  `foodHabits` FROM `patients` WHERE `id` = '$id'");
    $details = $details[0];
    ?>
                <!-- form area starts -->
                <div class="app-main__outer">
                    <div class="app-main__inner">
                    <div class="col-lg-12">
                      <?php if($details['foodHabits'] != NULL){ ?>
                      <form action="functionality/food_habits_updateact.php" method="POST">
                        <b>Food Habits</b>
                        <div class="table-responsive">
                          <table class="table " id="dynamic_field">
                            <tr>
                              <td><button type="button" name="add" id="add" class="mt-2 btn btn-primary btn-lg btn-block">Add More</button></td>
                                <?php
                                      $foodHabits = e_d('d',$details['foodHabits']);
                                      $foodHabits = unserialize($foodHabits);
                                      for($x=0;$x<sizeof($foodHabits);$x++)
                                      {
                                          ?>
                                          <tr id="row<?php echo $x+1; ?>">
                                            <td><input type="text" name="foodHabits[]" value="<?php echo $foodHabits[$x]; ?>" class="form-control name_list" /></td>
                                            <td><button type="button" name="remove" id="<?php echo $x+1; ?>" class="btn btn-danger btn_remove">X</button></td>
                                          </tr>
                                              <?php
                                      }
                                ?>


                            </tr>
                          </table>
                        </div>
                        <input type="hidden" name="patientID" value="<?php echo $id; ?>">
                          <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Update</button>
                      </form>
                    <?php }else{ ?>
                      <form action="functionality/food_habits_updateact.php" method="POST">
                        <b>Food Habits</b>
                        <div class="table-responsive">
                          <table class="table " id="dynamic_field1">
                            <tr>
                              <td><input type="text" name="foodHabits[]" placeholder="Enter Food Habits" class="form-control name_list" /></td>
                              <td><button type="button" name="add1" id="add1" class="mt-2 btn btn-primary">Add More</button></td>
                            </tr>
                          </table>
                        </div>
                        <input type="hidden" name="patientID" value="<?php echo $id; ?>">
                          <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Update</button>
                      </form>
                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
</div>
</body>
</html>

<script>
$(document).ready(function(){
  var i = <?php echo $x ?>;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="foodHabits[]" placeholder="Enter Food Habits" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>

<script>
$(document).ready(function(){
  var i=1;
	$('#add1').click(function(){
		i++;
		$('#dynamic_field1').append('<tr id="row'+i+'"><td><input type="text" name="foodHabits[]" placeholder="Enter Food Habits" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
});
</script>
