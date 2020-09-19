<?php
include "dash_common.php";
$token = getThis("SELECT `ipdToken` FROM `patients` WHERE `id` = '$id'");
$token = $token[0]['ipdToken'];
?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-md-12 col-xl-12">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">
                            <h3><?php echo $token; ?></h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block" onclick="window.print()">Print Token </button>
        <a href="dashboard.php" class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Back To Home </button>