<?php include "dash_common.php"; ?>

<div class="app-main__outer">
    <div class="app-main__inner">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Discussion Panel</h5>
              <form class="" action="functionality/questionact.php" method="post">
                  <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Question</label>
                      <div class="col-sm-10"><input name="question" id="exampleSelect" placeholder = "Subject of your Discussion" class="form-control"></input></div>
                  </div>
                  <div class="position-relative row form-check">
                      <div class="col-sm-10 offset-sm-2">
                        <input type="hidden" name="patientID" value="<?php echo $id; ?>">
                          <button class="btn btn-primary" name="submit">Submit</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>


      <?php
      $questions = getThis("SELECT  `id`,`doctorID`, `patientID`, `question` FROM `discussion` ORDER BY `askedAt` DESC");
      for($i=0;$i<sizeof($questions);$i++)
      {
        $temp = $questions[$i];
      ?>

      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title"><?php
              $name = "Anonymous";
              if(isset($temp['patientID']) != NULL)
              {
                $patientID = $temp['patientID'];
                $patient = getThis("SELECT `fullName` from `patients` WHERE  `id`='$patientID'");
                $patient = $patient[0]['fullName'];
                $patient = e_d('d',$patient);
                echo $patient;
              }
              if(isset($temp['doctorID']) != NULL)
              {
                $doctorID = $temp['doctorID'];
                $doctor = getThis("SELECT `fullName` from `doctors` WHERE  `id`='$doctorID'");
                $doctor = $doctor[0]['fullName'];
                $doctor = e_d('d',$doctor);
                echo $doctor;
              }
           ?></h5>
           <?php echo e_d('d',$temp['question']); ?>
           <!-- <br> -->
           <p align="right">
             <a href="answer.php?id=<?php echo e_d('e',$temp['id']); ?>" class="btn btn-primary">Answer</a>
           </p>
          </div>
      </div>
    <?php } ?>
    </div>
  </div>
</body>
</html>
