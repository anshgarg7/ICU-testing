<?php
include "dash_common.php";
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div>Register a New Room/Ward
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Operation Theater Registeration</h5>
                            <form class="" action="functionality/ot_registeract.php" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Operation Theatre Name</label><input name="name" placeholder="Operation Theatre Name/Number" type="text" class="form-control"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Description Of OT</label><input name="description" placeholder="Description Regarding Use of OT" type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Location of OT</label><input name="location" placeholder="Location of the OT W.R.T hospital" type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Opening Time (Non-Emergency Condition)</label><input name="openingTime" placeholder="starting time of OT" type="time" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Closing Time (Non-Emergency Condition)</label><input name="closingTime" placeholder="Closing Time of OT" type="time" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Maintenance Time Required After Surgery</label><input name="maintenance" placeholder="Maintenance Time Required After Surgery " type="number" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>