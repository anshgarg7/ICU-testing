<?php
// include "../assets/fxn.php";
include "dash_common.php";
$reportId = e_d('d',$_GET['id']);
 ?>
<!doctype html>
<html lang="en">

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Upload Test Report
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="row">
													<div class="col-lg-12">
															<div class="tab-content">
																	<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
																			<div class="main-card mb-3 card">
																					<div class="card-body"><h5 class="card-title">Upload Report</h5>
																							<form action="functionality/uploadcontentact.php" method="POST" enctype="multipart/form-data">
																								<div class="form-row">
																										<div class="col-md-9">
																											<div class="position-relative form-group"><label for="description" class="">Test Name</label><input name="testName" id="description" type="text" class="form-control" placeholder="Name of the tests conducted" required></div>
																										</div>
																										<div class="col-md-3">
																											<div class="position-relative form-group">
																												<label for="description" class="">Upload File</label>
																												<input class="form-control" type="text" name="uploadedFile" placeholder="Select Your File Here" onfocus="this.type='file'" style="background:none; border:none;">
																											</div>
																										</div>
                                                <input type="hidden" name="reportId" value="<?php echo $reportId; ?>">



																								</div>
																									<button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Submit</button>
																							</form>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>

																	</div>
																</div>
<script type="text/javascript" src="../assets/scripts/main.js"></script></body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->

<script>
function myFunction(ele) {
				var srcElement = document.getElementById(ele);
				if (srcElement != null) {
					if (srcElement.style.display == "block") {
						srcElement.style.display = 'none';
					}
					else {
						srcElement.style.display = 'block';
					}
					return false;
				}
			}
</script>
<script>
//var result = ["test1", "test2", "test3"];
$(document).ready(function(){
  $('.edit').click(function(){
   var locationId = $(this).attr('id');
     $.ajax({
      url: 'geteditlocationajax.php',
      type: 'post',
      data: {'P343D': locationId},
      datatype:"JSON",
      success: function(result){
        result = JSON.parse(result);
        $('#myEDIT').css("display","block");
        $('#location_name').html(result.locationName);
        $('#location_address').html(result.locationAddress);
        $('#location_phone').html(result.locationPhone);
        $('#location_logo').html(result.locationLogo);
        $('#location_enabled').html(result.enabled);
      }
    });
  });
});
</script>

</html>
