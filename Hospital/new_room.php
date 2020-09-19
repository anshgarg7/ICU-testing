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
                            <h5 class="card-title">Room/Ward Registeration</h5>
                            <form class="" action="functionality/room_registeract.php" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Name of Room</label><input name="name" placeholder="Room/Ward Name" type="text" class="form-control"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Description of Room</label><input name="description" placeholder="Description Regarding Use of Room" type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Location of Room</label><input name="location" placeholder="Location of the Room W.R.T hospital" type="text" class="form-control"></div>
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




</body>

</html>