<?php

$DBhost = "localhost";
$DBuser = "root";
$DBpassword ="";
$DBname="file_upload_restapi_db";

$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname); 

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

?> 