<?php include "assets/fxn.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $value = $_POST["UserType"];
    if ($value == 1) {
?>
        <form action="icu/functionality/iculoginact.php" method="POST" id="icuform">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input type="hidden" name="password" value="<?php echo $password; ?>">
        </form>

        <script type="text/javascript">
            document.getElementById('icuform').submit(); // SUBMIT FORM
        </script>

    <?php
    } else if ($value == 2) {
    ?>
        <form action="Hospital/functionality/hospital_loginact.php" method="POST" id="hospform">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input type="hidden" name="password" value="<?php echo $password; ?>">
        </form>

        <script type="text/javascript">
            document.getElementById('hospform').submit(); // SUBMIT FORM
        </script>
    <?php
    } else if ($value == 3) {
    ?>
        <form action="doctor/functionality/docloginact.php" method="POST" id="docform">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input type="hidden" name="password" value="<?php echo $password; ?>">
        </form>

        <script type="text/javascript">
            document.getElementById('docform').submit(); // SUBMIT FORM
        </script>
    <?php
    } else if ($value == 4) {
    ?>
        <form action="nurse/functionality/nurseloginact.php" method="POST" id="nurseform">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input type="hidden" name="password" value="<?php echo $password; ?>">
        </form>

        <script type="text/javascript">
            document.getElementById('nurseform').submit(); // SUBMIT FORM
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert("Some Technical Error!!");
        window.location = "index.php";
    </script>
<?php
}

?>