<?php

include "connectDB.php";
include "head.php";

//Get addTrain.php inputs
$programName = $_GET['programName'];
$schoolName = $_GET['schoolName'];

$query = "DELETE FROM moe_programme WHERE program_name='$programName' AND school_school_name='$schoolName'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('MOE Program Deleted!')</script>";
    echo '<script language="javascript">window.location = "moe.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "moe.php"</script>';
}

?>