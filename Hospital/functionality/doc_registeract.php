<?php
include "../../assets/fxn.php";
if(isset($_SESSION["UID"])==null){
 	?>
 	<script type="text/javascript">
 		window.location='logout.php';
 	</script>
	<?php
}
$name = e_d('e',$_POST['name']);
$phone = e_d('e',$_POST['phone']);
$email = e_d('e',$_POST['email']);
$address = e_d('e',$_POST['add1']);
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$hospitalID = $_SESSION["UID"];
$departmentID = $_POST['did'];
$qualificationID = $_POST['qid'];
$dob = $_POST['dob'];
$basicPay = $_POST['bPay'];
$consultation = $_POST['fee'];
$allowance = $_POST['allowance'];

// if(isset($_POST['submit']))
// {
//     doThis("INSERT INTO `doctors`(`hospitalID`, `departmentID`, `qualificationID`, `fullName`, `phoneNumber`, `emailAddress`, `dob`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `createdAt`) VALUES ('$hospitalID','$departmentID','$qualificationID','$name','$phone','$email','$dob','$address','$city','$state','$country','$email','$phone',CURRENT_TIMESTAMP())");

 //     <script>
 //         alert("Doctor Registered Successfully!!");
//         window.location = "../doctor_register.php";
 // </script>

 // }



if(isset($_POST['submit']))
{


        $email_check  = getThis("select * from `doctors` where `emailAddress` = '$email'");
        if(sizeof($email_check) > 0)
        {
            ?>
            <script> alert("This email is already present");
              window.location='../doctor_register.php';
            </script>
            <?php
        }
        else
        {
            $insert_query = doThis("INSERT INTO `doctors`(`hospitalID`, `departmentID`, `qualificationID`, `fullName`, `phoneNumber`, `emailAddress`, `dob`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`, `createdAt`,`consultationFee`) VALUES ('$hospitalID','$departmentID','$qualificationID','$name','$phone','$email','$dob','$address','$city','$state','$country','$email','$phone',CURRENT_TIMESTAMP(),'$consultation')");
            $doctorID = getThis("SELECT `id` FROM `doctors` WHERE `emailAddress`= '$email'");
            $doctorID = $doctorID[0]['id'];
            $salary_insert = doThis("INSERT INTO `doctorsalary`(`doctorId`, `basicPay`, `allowance`) VALUES ('$doctorID','$basicPay','$allowance')");

            if($insert_query && $salary_insert)
            {
                ?>
                <script>
                    alert("Registration Done. Now You Can Login!!");
                    window.location = "../index.php";
                    </script>
                    <?php
            }
           else
           {
            ?>
            <script> alert("There is some technical error");
              window.location='../index.php';
            </script>
            <?php
           }
        }
    }



?>
