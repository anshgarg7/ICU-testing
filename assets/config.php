<?php
session_start();
// Database Configrations
$d_username="root"; //database username
$d_password=""; //database password
$d_host="localhost"; //database host name
$d_database="icu"; //database name
$con = new mysqli($d_host,$d_username,$d_password,$d_database);
// Date Time Configrations
$date = date_create();
date_default_timezone_set("Asia/Calcutta");
date_timestamp_get($date);
// Communications
$SMS_Permissions=FALSE;
$Email_Permissions=FALSE;
// Email Client Info

// Deployment Specific Configrations
$GLOBALS['SecretKey']="Pa3gD0dl";
$GLOBALS['SecretIV']="m8we03Tq";
?>
