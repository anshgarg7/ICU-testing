<?php
include "../../assets/fxn.php";
$id = $_SESSION['UID'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = e_d('e', $name);
    $description = $_POST['description'];
    $description = e_d('e', $description);
    $location = $_POST['location'];
    $location = e_d('e', $location);
    $opening = $_POST['openingTime'];
    $opening = e_d('e', $opening);
    $closing = $_POST['closingTime'];
    $closing = e_d('e', $closing);
    $maintenance = $_POST['maintenance'];
    $maintenance = e_d('e', $maintenance);

    $res = doThis("INSERT INTO `operationtheatre`( `hospitalId`, `otName`, `otLocation`, `otDescription`, `otOpeningTime`, `otClosingTime`, `maintenanceTime`, `generatedAt`) VALUES('$id','$name','$location','$description','$opening','$closing','$maintenance',CURRENT_TIMESTAMP() ) ");
    if ($res) {
?>
        <script>
            alert("Operation Theatre Registered !!");
            window.location = "../OTregister.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Some Technical Error !!");
            window.location = "../dashboard.php";
        </script>
<?php
    }
}
?>
