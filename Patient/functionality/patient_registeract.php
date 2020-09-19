<?php

include "../../assets/fxn.php";


$name = e_d('e',$_POST['name']);
$phone = e_d('e',$_POST['phone']);
$email = e_d('e',$_POST['email']);
$address = e_d('e',$_POST['add1']);
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$username = e_d('e',$_POST['uid']);
$pswd = e_d('e',$_POST['pass']);
$cpswd = e_d('e',$_POST['cpass']);

if(isset($_POST['sub']))
{
    if($pswd === $cpswd)
    {
        // $email_check = "select * from patients where emailAddress = '$email' ";
        // $e_check = mysqli_query($con,$email_check);
        $email_check  = getThis("select * from patients where emailAddress = '$email'");
        if(sizeof($email_check) > 0)
        {
            ?>
            <script> alert("This email is already present");
              window.location='../patient_signup.php';
            </script>
            <?php
        }
        else
        {
            // $uid_check = "select * from patients where username = '$username' ";
            // $u_check = mysqli_query($con,$uid_check);
            $username_check = getThis("select * from patients where username = '$username' ");
        if(sizeof($username_check) > 0)
        {
            ?>
            <script> alert("This username is already present");
              window.location='../patient_signup.php';
            </script>
            <?php
        }
        else
        {
            // $temp_quer = "INSERT INTO `patients`(`fullName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`,  `createdAt`)
            // VALUES  ('$name','$phone','$email', '$address','$city','$state','$country','$username','$pswd',CURRENT_TIMESTAMP()) ";
            // $query = mysqli_query($con,$temp_quer);
            $insert_query = doThis("INSERT INTO `patients`(`fullName`, `phoneNumber`, `emailAddress`, `addressLine1`, `cityID`, `stateID`, `countryID`, `username`, `password`,  `createdAt`) VALUES  ('$name','$phone','$email', '$address','$city','$state','$country','$username','$pswd',CURRENT_TIMESTAMP()) ");
            if($insert_query)
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
              window.location='../../index.php';
            </script>
            <?php
           }
        }
    }
    }
    else
    {
        ?>
        <script> alert("Passwords don't match");</script>
        <?php
    }
}


?>
