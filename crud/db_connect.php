<?php 

$localhost = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "cr11_anes_travelmatic"; 

// create connection 
$mysqli = new mysqli($localhost, $username, $password, $dbname); 

// check connection 
if($mysqli->connect_error) {
   die("connection failed: " . $mysqli->connect_error);
} else {
   // echo "Successfully Connected";
}

?>