<?php
include "dash_common.php";
?>

<!-- form area starts -->
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
        <form action="functionality/book_room.php" method="post">
            <div class="wrap-input100">
                <div class="position-relative form-group"><label for="exampleCity" class=""><span class="label-input100">
                            <h5>Room</h5>
                        </span></label><select class="form-control" name="room" id="room_c" required>
                        <option selected disabled>Select Room For Patient</option>
                        <?php $rooms = getThis("SELECT `id`, `roomName`,`roomDescription` FROM `rooms` WHERE `hospitalId` = '$id'") ?>
                        <?php foreach ($rooms as $k => $c) { ?>
                            <option value="<?php echo $c['id']; ?>"><?php echo e_d('d', $c['roomName']) . "-> " . e_d('d', $c['roomDescription']); ?></option>
                        <?php } ?>
                    </select></div>
                <div class="wrap-input100">
                    <div class="position-relative form-group"><label for="exampleState" class=""><span class="label-input100">
                                <h5>Bed For the Patient</h5>
                            </span></label><select class="form-control" name="bed" id="bed_c" required>
                            <option disabled selected>Select Room First</option>
                        </select></div>
                </div>
                <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" type="submit" name="submit">Book</button>
            </div>

        </form>
    </div>
</div>
</body>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        $("#room_c").change(function() {
            var roomID = $("#room_c").val();
            $.ajax({
                url: '../assets/worldData.php',
                method: 'post',
                data: 'room=' + roomID
            }).done(function(rooms) {
                beds = JSON.parse(rooms);
                $('#bed_c').empty();
                $('#bed_c').append('<option disabled selected>Select bed</option>');
                beds.forEach(function(bed) {
                    $('#bed_c').append('<option value=' + bed.id + '>' + bed.bedNumber + '--' + bed.bedUsability + '--' + bed.equipmentAvailable + '</option>');
                })
                $('#bed_c').append('<option value=0>My option is not listed</option>');
            })
        });
    })
</script>
