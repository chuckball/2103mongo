<?php

include "connectDB.php";
include "head.php";

//Get addTrain.php inputs
$stationID = strtoupper($_GET['trainID']);

$query = "DELETE FROM mrt_station WHERE station_id='$stationID'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('MRT Station Deleted!')</script>";
    echo '<script language="javascript">window.location = "train.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "train.php"</script>';
}

?>