<?php
include "../../assets/fxn.php";

if(isset($_POST['submit']))
{
    $review = $_POST['review'];
    $id = $_POST['reportId'];
    $review = e_d('e',$review);
    $res = doThis("UPDATE `labreports` SET `reportReview` = '$review', `enabled` = '1' WHERE `id` = '$id' ");
    if($res)
    {
        ?>
        <script>
        alert("Report Review Submit Successfully!!");
        window.location = "../reviewReport.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Some Technical Error!!");
            window.location = "../reviewReport.php";
        </script>
        <?php
    }
}
?>
