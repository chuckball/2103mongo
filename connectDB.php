<?php

$hostname = "rm-gs5py2dcox6x82w4l6o.mysql.singapore.rds.aliyuncs.com";
$username = "ict2103group3";
$dbname = "group3";
$password = "bcb6NbmbSmpB";
$mysqli = new mysqli("$hostname", "$username", "$password", "$dbname");

// Check connection
//if ($mysqli->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
?>