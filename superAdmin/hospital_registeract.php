<?php
require "../../assets/fxn.php";
$name = e_d('e', $_POST['name']);
$phone = e_d('e', $_POST['phone']);
$email = e_d('e', $_POST['email']);
$address = e_d('e', $_POST['add1']);
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];


if (isset($_POST['submit'])) {
    $email_check = getThis("SELECT * FROM `hospitals` WHERE `emailAddress` = '$email'");
    if (sizeof($email_check) > 0) {
?>
        <script>
            alert("Email Address Already Exists!!");
            window.location = "hospital_register.php";
        </script>
    <?php
    } else {
        doThis("INSERT INTO `hospitals`( `hospitalName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `createdAt`) VALUES ('$name','$phone','$email','$address','$city','$state','$country','$email','$phone',CURRENT_TIMESTAMP())");
    ?>
        <script>
            alert("Hospital Registered Successfully!!");
            window.location = "../index.php";
        </script>
<?php
    }
}
?>
