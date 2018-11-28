<?php

include "connectDB.php";
include "head.php";

//Get addTrain.php inputs
$stationID = strtoupper($_POST['station_id']);
$stationName = $_POST['station_name'];
$stationLine = $_POST['station_line'];


$query = "INSERT INTO mrt_station (station_id, station_name, station_line) VALUES ('$stationID', '$stationName', '$stationLine')";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('MRT Station Added!')</script>";
    echo '<script language="javascript">window.location = "train.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "train.php"</script>';
}

?>