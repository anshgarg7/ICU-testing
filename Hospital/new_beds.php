<?php
include "dash_common.php";
$roomId = e_d('d', $_GET['id']);
// echo $id;
$room_name = getThis("SELECT `roomName` FROM `rooms` WHERE `id` = '$roomId'");
$room_name = $room_name[0]['roomName'];
$room_name = e_d('d', $room_name);
?>
<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">

          <div><?php echo "Room/Ward Name : " . $room_name; ?>
          </div>
        </div>
      </div>
    </div>
    <form action="functionality/register_bedact.php" method="post">
      <table class="table " id="dynamic_field2">
        <thead>
          <th>Bed Number</th>
          <th>Bed Usability</th>
          <th>Machinery Available</th>
        </thead>
        <tr>
          <td><input type="text" name="number[]" placeholder="Enter The Bed Number" class="form-control name_list" required /></td>

          <td><input type="text" name="usability[]" placeholder="Enter The Usability of Bed" class="form-control name_list" required /></td>
          <td><input type="text" name="equipments[]" placeholder="Enter the equipments available at Bed" class="form-control name_list" required /></td>

          <td><button type="button" name="add2" id="add2" class="mt-2 btn btn-primary">Add Next Bed</button></td>
        </tr>
      </table>
      <input type="hidden" value="<?php echo $roomId; ?>" name="room">
      <div class="col-md-12">
        <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Submit</button>
      </div>
    </form>

  </div>
</div>


<script>
  $(document).ready(function() {
    var i = 1;
    $('#add2').click(function() {
      i++;
      $('#dynamic_field2').append('<tr id="row' + i + '"> <td><input type="text" name="number[]" placeholder="Enter The Bed Number" class="form-control name_list" required/></td><td><input type="text" name="usability[]" placeholder="Enter various conditions this bed can be used" class="form-control name_list" required /></td><td><input type="text" name="equipments[]" placeholder="Equipments Available at the Bed" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>