<?php include "dash_common.php"; ?>
    <?php
    $details = getThis("SELECT  `familyHistory` FROM `patients` WHERE `id` = '$id'");
    $details = $details[0];
    ?>
                <!-- form area starts -->
                <div class="app-main__outer">
                    <div class="app-main__inner">
                    <div class="col-lg-12">
                      <form action="functionality/family_history_updateact.php" method="POST">
                          <div class="position-relative form-group"><label for="exampleAddress" class=""><b>Family History</b></label><textarea name="familyHistory" id="familyHistory"  class="form-control"><?php echo e_d('d',$details['familyHistory']); ?></textarea></div>
                          <input type="hidden" name="patientID" value="<?php echo $id; ?>">
                          <button class="mb-2 mr-2 btn btn-success btn-lg btn-block" name="submit">Update</button>
                      </form>

                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
</div>
</body>
</html>
