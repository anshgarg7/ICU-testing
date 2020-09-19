<?php
require "../../assets/fxn.php";
$name = e_d('e', $_POST['name']);
$phone = e_d('e', $_POST['phone']);
$email = e_d('e', $_POST['email']);
$address = e_d('e', $_POST['add1']);
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$hospitalId = $_POST['hospital'];


if (isset($_POST['submit'])) {
    $email_check = getThis("SELECT * FROM `laboratories` WHERE `emailAddress` = '$email'");
    if (sizeof($email_check) > 0) {
?>
        <script>
            alert("Email Address Already Exists!!");
            window.location = "laboratory_register.php";
        </script>
    <?php
    } else {
      $res =   doThis("INSERT INTO `laboratories`( `laboratoryName`, `phoneNumber`,`hospitalId`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `createdAt`)
        VALUES ('$name','$phone', '$hospitalId' ,'$email','$address','$city','$state','$country','$email','$phone',CURRENT_TIMESTAMP())");

    if($res) {?>
        <script>
            alert("Laboratory Registered Successfully!!");
            window.location = "../index.php";
        </script>
<?php
    }
  }
}
?>
