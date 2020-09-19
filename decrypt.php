<?php
include "assets/fxn.php"
?>

<form action="decrypt.php" method="post">
  <input type="text" name="string"><br><br>
  <input type="submit" name="submit">
</form>

<?php
if(isset($_POST['submit']))
{
  $string = $_POST['string'];
  $string = e_d('d',$string);
  echo $string;
}
 ?>
