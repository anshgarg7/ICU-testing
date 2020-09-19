<?php include "dash_common.php"; ?>
<div class="app-main__outer">
    <div class="app-main__inner">
<?php
  if(isset($_POST['submit']))
  {
    $username = $_POST['username'];
    $username = e_d('e',$username);
    $patientID = getThis("SELECT `id` FROM `patients` WHERE `username` = '$username'");
    $patientID = $patientID[0]['id'];
    $labTest = getThis("SELECT `id`,`labTestAdvice` FROM `prescription` WHERE `patientID` = '$patientID' ORDER BY `generatedAt` DESC");

?>
<div class="col-lg-12">
  <form action="takeSample.php" method="post">
    <input type="hidden" value="<?php echo $username; ?>" name="username" >
  <button class="mb-2 mr-2 btn-lg btn-primary btn-block" name="submit" type="submit"> Self Referred</button>
</form>
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Laboratory Tests Adviced to the Patient</h5>
            <table class="mb-0 table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Test Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- <tr> -->
                  <?php
                  $count = 0;
                  for($x=0;$x<sizeof($labTest);$x++)
                  {
                    $temp = $labTest[$x]['labTestAdvice'];
                      if(isset($temp)!=NULL){ ?>
                        <tr>
                          <th scope="row"><?php echo ($count+1);
                          $count++; ?></th>

                          <td>
                        <?php $temp = e_d('d',$temp);
                        $temp = unserialize($temp);
                        ?>
                        <!-- <tr> -->
                          <?php
                        for($y=0;$y<sizeof($temp);$y++){

                   ?>

                    <?php echo $temp[$y]."<br>"; ?>
                  <?php } ?>
                  </td>
                    <td><a href="takeSample.php?id=<?php echo e_d('e',$labTest[$x]['id']); ?>" class="mb-2 mr-2 btn btn-primary btn-block" >Take Sample</a></td>
                  </tr>
                    <?php }
                } ?>
                <!-- </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php }else{
    $username = $_GET['id'];
    $patientID = getThis("SELECT `id` FROM `patients` WHERE `username` = '$username'");
    $patientID = $patientID[0]['id'];
    $labTest = getThis("SELECT `id`,`labTestAdvice` FROM `prescription` WHERE `patientID` = '$patientID' ORDER BY `generatedAt` DESC");

?>
<div class="col-lg-12">
  <form action="takeSample.php" method="post">
    <input type="hidden" value="<?php echo $username; ?>" name="username" >
  <button class="mb-2 mr-2 btn-lg btn-primary btn-block" name="submit" type="submit"> Self Referred</button>
</form>
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Laboratory Tests Adviced to the Patient</h5>
            <table class="mb-0 table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Test Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- <tr> -->
                  <?php
                  $count = 0;
                  for($x=0;$x<sizeof($labTest);$x++)
                  {
                    $temp = $labTest[$x]['labTestAdvice'];
                      if(isset($temp)!=NULL){ ?>
                        <tr>
                          <th scope="row"><?php echo ($count+1);
                          $count++; ?></th>

                          <td>
                        <?php $temp = e_d('d',$temp);
                        $temp = unserialize($temp);
                        ?>
                        <!-- <tr> -->
                          <?php
                        for($y=0;$y<sizeof($temp);$y++){

                   ?>

                    <?php echo $temp[$y]."<br>"; ?>
                  <?php } ?>
                  </td>
                    <td><a href="takeSample.php?id=<?php echo e_d('e',$labTest[$x]['id']); ?>" class="mb-2 mr-2 btn btn-primary btn-block" >Take Sample</a></td>
                  </tr>
                    <?php }
                } ?>
                <!-- </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>


</div>
</div>
</body>
</html>
