<?php
include "../../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
  <script type="text/javascript">
    window.location = 'logout.php';
  </script>
  <?php
}


if (isset($_POST['submit'])) {
  $hospitalID = $_SESSION["UID"];
  $name = $_POST['name'];
  $name = e_d('e', $name);
  $description = $_POST['description'];
  $description = e_d('e', $description);
  $location = $_POST['location'];
  $location = e_d('e', $location);
  $res = doThis("INSERT INTO `rooms`(`roomName`, `roomDescription`,  `hospitalId`,`roomLocation`, `generatedAt`) VALUES ('$name','$description','$hospitalID', '$location' ,CURRENT_TIMESTAMP())");
  if ($res) {
  ?>
    <script type="text/javascript">
      alert("Room Registered !!");
      window.location = "../new_room.php";
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert("Some Technical Error Occurred !!");
      window.location = "../new_room.php";
    </script>
<?php
  }
}
?>
