<?php include "dash_common.php"; ?>

<div class="app-main__outer">
    <div class="app-main__inner">
<?php
if(isset($_POST['submit']))
{
  $doctor = $_POST['doctor'];
  $tokenArr = getThis("SELECT `allTokens` FROM `doctors` WHERE `id` = '$doctor'");
  $tokenArr = $tokenArr[0]['allTokens'];
  // $attendance = array('0' => "123");
  if(isset($tokenArr) != NULL)
  {
    $tokenArr = e_d('d',$tokenArr);
    $tokenArr = unserialize($tokenArr);
    for($i=0;$i<sizeof($tokenArr);$i++)
    {
        $temp_id = $tokenArr[$i];
        $date = getThis("SELECT `token`, `generatedAt` FROM `doctoken` WHERE `id` = '$temp_id'");
        $date = $date[0];
        if($i ==0)
          {$attendance = array($i => substr($date['generatedAt'],0,10));}
          else {
            array_push($attendance, substr($date['generatedAt'],0,10));
          }
        // $attendance = array_push($attendance, substr($date['generatedAt'],0,10));
    }

    // echo gettype($attendance);
    $result = array_unique($attendance);
    // echo sizeof($attendance);
    for($x=0;$x<sizeof($result);$x++)
    {
      echo $result[$x]."<br>";
    }
  }
  else {
    echo "No records found";
  }
}

 ?>
</div>
</div>
</body>
</html>
