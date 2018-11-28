<?php

include "connectDB.php";
include "head.php";

//Get addTrain.php inputs
$schoolID = strtoupper($_GET['schoolID']);

$query = "DELETE FROM school WHERE school_name='$schoolID'";
$result = $mysqli->query($query);

if ($result) {
    echo "<script type='text/javascript'>alert('School Deleted!')</script>";
    echo '<script language="javascript">window.location = "school.php"</script>';
} else {
    echo "<script type='text/javascript'>alert('Error in updating database')</script>";
    echo '<script language="javascript">window.location = "school.php"</script>';
}

?>