<?php include "dash_common.php";

$questionId = $_GET['id'];
$questionId = e_d('d',$questionId);

$details = getThis("SELECT `question`,`answer` FROM `discussion` WHERE `id` = '$questionId'");
$details = $details[0];
$question = e_d('d',$details['question']);

?>
<div class="app-main__outer">
    <div class="app-main__inner">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Your Answer</h5>
              <form class="" action="functionality/answeract.php" method="post">
                  <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Question</label>
                      <div class="col-sm-10"><input name="subject" id="exampleSelect" value = "<?php echo $question; ?>" class="form-control" readonly></input></div>
                  </div>
                  <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Answer</label>
                      <div class="col-sm-10"><textarea name="answer" id="exampleText" class="form-control" rows="5" cols="60"></textarea></div>
                  </div>
                  <input type="hidden" name="questionID" value="<?php echo $questionId ; ?>">
                  <input type="hidden" name="patientID" value="<?php echo $id ;?>">
                    <div class="position-relative row form-check">
                      <div class="col-sm-10 offset-sm-2">
                          <button class="btn btn-primary" name="submit">Submit</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>


      <?php
      $answers = getThis("SELECT `id`,`answer` FROM `discussion` WHERE  `id` = '$questionId'");
      $answers = $answers[0]['answer'];
      if(isset($answers) != NULL){
          $answers = e_d('d',$answers);
          $answers = unserialize($answers);
      for($i=0;$i<sizeof($answers);$i++)
      {
        $temp = $answers[$i];
        $temp = unserialize($temp);
        $doctor = $temp['doctor'];
        $patient = $temp['patient'];
        $answer = $temp['answer'];
        $temp_name = "Anonymous";
        if($doctor != 0)
        {
          $doctor = getThis("SELECT `fullName` from `doctors` where `id` = '$doctor'");
          $doctor = $doctor[0]['fullName'];
          $temp_name = e_d('d',$doctor);
        }
        if($patient != 0)
        {
          $patient = getThis("SELECT `fullName` from `patients` where `id` = '$patient'");
          $patient = $patient[0]['fullName'];
          $temp_name = e_d('d',$patient);
        }
       ?>
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title"><?php echo $temp_name; ?></h5>
              <?php echo $answer; ?>
          </div>
      </div>
    <?php }  } ?>
    </div>
  </div>
</body>
</html>
