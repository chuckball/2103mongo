<?php

include "connectDB.php";
include "head.php";

//Get addTrain.php inputs
$stationID = strtoupper($_POST['station_id']);
$stationName = $_POST['station_name'];
$stationLine = $_POST['station_line'];


$query = "UPDATE train_station SET station_name='$stationName', station_line='$stationLine' WHERE station_id = '$stationID'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('MRT Station Updated!')</script>";
    echo '<script language="javascript">window.location = "train.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "train.php"</script>';
}

?>