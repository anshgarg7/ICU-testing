<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'health');

// call the register() function if register_btn is clicked
if (isset($_POST['docbtn'])) {
	register_doctor();
}
if (isset($_POST['patbtn'])) {
	register_patient();
}

// REGISTER DOCTOR
function register_doctor(){
	// call these variables with the global keyword to make them available in function
	global $db, $username;

	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password  =  e($_POST['password']);
  $name  =  e($_POST['name']);
  $gender  =  e($_POST['gender']);
  $hospital  =  e($_POST['hospital']);
  $mobile_no  =  e($_POST['mobile_no']);
  $experience  =  e($_POST['experience']);
  $specialization  =  e($_POST['specialization']);

	$password = md5($password);
	$query = "INSERT INTO doctordata (email,name,gender,mobile_no,hospital, experience, specialization)
					  VALUES('$email', '$name', '$gender','$mobile_no','$hospital','$experience','$specialization' )";
  mysqli_query($db, $query);
	$_SESSION['success']  = "New user successfully created!!";
	$logged_in_user_id = mysqli_insert_id($db);
	$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
	$_SESSION['success']  = "You are now logged in";
	header('location: index.php');
	}

// REGISTER PATIENT
function register_patient(){
	global $db, $username;
	$username    =  e($_POST['username']);
	$password  =  e($_POST['password']);
  $name  =  e($_POST['name']);
  $gender  =  e($_POST['gender']);
  $age  =  e($_POST['age']);
  $location = e($_POST['location']);
  $mobile_no  =  e($_POST['mobile_no']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

		$password = md5($password);

			$query = "INSERT INTO doctordata (username, password ,name,gender,age,mobile_no,location)
					  VALUES('$username','$password', '$name', '$gender','$age','$mobile_no','$location' )";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');

			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');
	}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
