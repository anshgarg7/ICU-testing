<?php
include "dash_common.php";

$ipdId = $_GET['id'];
$ipdId = e_d('d', $ipdId);

?>
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
        <form action="functionality/suggestDate.php" method="post">
            <div class="position-relative form-group"><label for="exampleText" class="">
                    <h3>Remarks (if any)</h3>
                </label><textarea name="remarks" id="exampleText" class="form-control"></textarea></div>
            <h3>Date Change Wanted</h3>
            <input type="date" name="recommendedDate" required>
            <input type="hidden" name="ipdId" value="<?php echo $ipdId; ?>">
            <br>
            <br>
            <br>
            <button type="submit" name="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Submit</button>
        </form>
    </div>
</div>