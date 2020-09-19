<?php
session_start();
// Database Configrations
$d_username=""; //database username
$d_password=""; //database password
$d_host="localhost"; //database host name
$d_database=""; //database name
$con = new mysqli($d_host,$d_username,$d_password,$d_database);
// Date Time Configrations
$date = date_create();
date_default_timezone_set("Asia/Calcutta");
date_timestamp_get($date);
// Communications
//$SMS_Permissions=FALSE;
//$Email_Permissions=FALSE;
// Email Client Info
//$Mail_Host = 'smtp.yandex.com';
//$Mail_User = 'radio@patiala.city';
//$Mail_Pass = 'Radio@1922';
//$Mail_Method = 'ssl';
//$Mail_Port = 465;
//$Mail_Sender ="no_reply@patiala.city";
//$Mail_SenderName = "Patiala.City";
// Deployment Specific Configrations
//$GLOBALS['SecretKey']="Pa3gD0dl";
//$GLOBALS['SecretIV']="m8we03Tq";
?>
