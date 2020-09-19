<?php
include "../../assets/fxn.php";
if (isset($_SESSION["UID"]) == null) {
?>
    <script type="text/javascript">
        window.location = 'logout.php';
    </script>
    <?php
}
$hospitalId = $_SESSION["UID"];
if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    $usability = $_POST['usability'];
    $equipments = $_POST['equipments'];
    $room = $_POST['room'];
    for ($i = 0; $i < sizeof($number); $i++) {
        $num = $number[$i];
        $num = e_d('e', $num);
        $use = $usability[$i];
        $use = e_d('e', $use);
        $equip = $equipments[$i];
        $equip = e_d('e', $equip);
        $res = doThis("INSERT INTO `beds`(`bedNumber`,`roomId`, `bedUsability`, `equipmentAvailable`,`hospitalId`) VALUES ('$num', '$room' ,'$use','$equip','$hospitalId') ");
        if (!$res) {
    ?>
            <script>
                alert("Some Technical Error!!");
                window.location = "../new_room.php";
            </script>
    <?php
        }
    }
    $numberOfBeds = sizeof($number);
    $ans = doThis("UPDATE `rooms` SET `beds`= '$numberOfBeds' WHERE `id` = '$room'");
    ?>
    <script>
        alert("Bed(s) Registered !!");
        window.location = "../new_room.php";
    </script>
<?php
}
?>
