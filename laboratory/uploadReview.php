<?php
include "dash_common.php";
$reportId = e_d('d',$_GET['id']);
$report = getThis("SELECT `reportLink` FROM `labreports` WHERE `id` = '$reportId'");
$report = $report[0];
?>

<div class="app-main__outer">
                        <div class="app-main__inner">

<?php

                        $link = $report['reportLink'];
                        $link = e_d('d',$link);
                        ?>
                            <iframe src="<?php echo $link; ?>"  width="1200" height="450" style="float:none"></iframe>

                            <div class="col-md-12">
            <div class="card-body">
                <form class="" action="functionality/submitReview.php" method="post">
        <div class="position-relative form-group"><label for="exampleAddress" class=""><h4>Report Review (if any)</h4></label><input name="review" id="exampleAddress" placeholder="Review of The Report" type="text" class="form-control"></div>
        <input type="hidden" value="<?php echo $reportId; ?>" name = "reportId"></input>
        <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" name="submit">Submit</button>
      </form>
    </div>
          </div>