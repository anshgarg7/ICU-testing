<?php include "../../assets/fxn.php";

if (isset($_POST['submit'])) {
    $hospitalId = $_SESSION["UID"];
    $room = $_POST["room"];
    $date = $_POST["date"];
    $doctorId = $_POST["doctor"];
    $department = $_POST["department"];

    $res = doThis("INSERT INTO `ipdrounds`( `doctorID`, `hospitalID`, `roomID`, `roundDate`, `generatedAt`) VALUES ('$doctorId','$hospitalId','$room','$date',CURRENT_TIMESTAMP()) ");

    if ($res) {
?>
  <form action="../ipdround_view.php" method="post" name="f1">
  <input type="hidden" name="scheduled" value="1">
  <input type="hidden" name="doctor" value="<?php echo $doctorId; ?>">
  <input type="hidden" name="department" value="<?php echo $department; ?>">
  <script type="text/javascript">
    alert("Round Registered!!");
    document.f1.submit();
  </script>
  </form>
    <?php
    } else {
    ?>
        <script>
            alert("Some Technical Error!!");
            window.location = "../ipdround_view.php";
        </script>
<?php
    }
}
?>
